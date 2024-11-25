<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Google_Client;
use Google_Service_Oauth2;
use App\Models\UserModel;

class LoginController extends Controller
{
    private $googleClient;

    public function __construct()
    {
        $this->googleClient = new Google_Client();
        $this->googleClient->setClientId(getenv('googleClientId'));
        $this->googleClient->setClientSecret(getenv('googleClientSecret'));
        $this->googleClient->setRedirectUri(base_url('auth/callback'));
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }

    public function login()
    {
       // var_dump(session()->get());
       $data['title'] = "login";
       $data['authUrl'] = $this->googleClient->createAuthUrl();
        return view('pages/login',$data);
    }

   

    public function callback()
    {
    $code = $this->request->getVar('code');
    if ($code) {
        // log_message('debug', 'Authorization code: ' . $code);

        $url = 'https://oauth2.googleapis.com/token';
        $postData = [
            'code' => $code,
            'client_id' => getenv('googleClientId'),
            'client_secret' => getenv('googleClientSecret'),
            'redirect_uri' => base_url('auth/callback'),
            'grant_type' => 'authorization_code'
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // log_message('debug', 'HTTP status code: ' . $httpStatus);
        // log_message('debug', 'Response: ' . $response);

        if ($httpStatus == 200) {
            $token = json_decode($response, true);

            // Check if token is null or not an array
            if ($token === null || !is_array($token)) {
                log_message('error', 'Invalid token response: ' . $response);
                return redirect()->to('/login')->with('error', 'Invalid token response');
            }

            // log_message('debug', 'Token response: ' . json_encode($token));

            // Ensure all expected fields are present
            $token = array_merge([
                'access_token' => null,
                'expires_in' => 3600,  // Default to 1 hour if not provided
                'refresh_token' => null,
                'id_token' => null
            ], $token);

            if (isset($token['access_token'])) {
                // Save the access token and other data as needed
                $this->googleClient->setAccessToken($token);
                // log_message('debug', 'Access token set in Google Client');

                try {
                    // Use curl to fetch user info
                    $userInfoUrl = 'https://www.googleapis.com/oauth2/v1/userinfo';
                    $ch = curl_init($userInfoUrl);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Authorization: Bearer ' . $token['access_token']
                    ]);
                    $userInfoResponse = curl_exec($ch);
                    $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);

                    // log_message('debug', 'HTTP status code for user info: ' . $httpStatus);
                    // log_message('debug', 'User info response: ' . $userInfoResponse);

                    if ($httpStatus == 200) {
                        $data = json_decode($userInfoResponse, true);
                        log_message('debug', 'User data fetched: ' . json_encode($data));

                        // Process user data
                        // e.g., store user data in the session or database
                        // Store user data in session
                        session()->set('user_data', $data);


                            // Use the model to create or update the user
                            $userModel = new UserModel();
                            $userId = $userModel->createOrUpdateGoogleUser($data);

                            if ($userId) {
                                // Store user data in session
                                session()->set('user_data', $data);

                                return redirect()->to('/profile');
                            } else {
                                log_message('error', 'Error creating or updating user data');
                                return redirect()->to('/login')->with('error', 'Error creating or updating user data');
                            }


                           return redirect()->to('/profile');


                        return redirect()->to('/profile');
                    } else {
                        log_message('error', 'Error fetching user data: ' . $userInfoResponse);
                        return redirect()->to('/login')->with('error', 'Error fetching user data');
                    }
                } catch (\Exception $e) {
                    log_message('error', 'Error fetching user data: ' . $e->getMessage());
                    return redirect()->to('/login')->with('error', 'Error fetching user data');
                }
            } else {
                log_message('error', 'Error fetching access token: ' . json_encode($token));
                return redirect()->to('/login')->with('error', 'Error fetching access token');
            }
        } else {
            log_message('error', 'Error response from Google: ' . $response);
            return redirect()->to('/login')->with('error', 'Error response from Google');
        }
    } else {
        log_message('error', 'Authorization code not found');
        return redirect()->to('/login')->with('error', 'Authorization code not found');
    }
}

public function loginWithEmail()
{
    // Get POST data
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // Manually validate inputs
    $errors = [];

    // Check if email is provided and valid
    if (empty($email)) {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }

    // Check if password is provided
    if (empty($password)) {
        $errors[] = 'Password is required.';
    }

    // If there are errors, return JSON response with errors
    if (!empty($errors)) {
        return $this->response->setJSON([
            'status' => 'error',
            'errors' => $errors
        ]);
    }

    // Check if the user exists
    $userModel = new UserModel();
    $user = $userModel->where('email', $email)->first();
    if (!$user) {
        return $this->response->setJSON([
            'status' => 'error',
            'errors' => ['No account found with this email address.']
        ]);
    }

    // Check if the user is registered via Google
    if (!empty($user['google_id'])) {
        return $this->response->setJSON([
            'status' => 'error',
            'errors' => ['This account is registered via Google. Please use Google login.']
        ]);
    }

    // Verify the password
    if (!password_verify($password, $user['password'])) {
        return $this->response->setJSON([
            'status' => 'error',
            'errors' => ['Incorrect password.']
        ]);
    }


    session()->set('user_data', $user);

    // Return JSON response for success
    return $this->response->setJSON([
        'status' => 'success',
        'message' => 'Login successful. Redirecting...'
    ]);
}



}


