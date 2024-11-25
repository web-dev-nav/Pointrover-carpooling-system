<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\EmailModel;

class RegisterController extends BaseController
{
    protected $request;
    protected $userModel;
    protected $EmailModel;

    public function __construct()
    {
        // Initialize the UserModel
        $this->userModel = new UserModel();
        $this->EmailModel = new EmailModel();
    }

    public function index()
    {
      
       $data['title'] =  'Register';
      // $data['details'] = $this->DetailModel->getTripWithAddressMapping($id);
       return view('pages/register', $data);
    }

    public function forget()
    {
      
       $data['title'] =  'forget password';
      // $data['details'] = $this->DetailModel->getTripWithAddressMapping($id);
       return view('pages/forget', $data);
    }


    
    public function registerWithEmail()
    {
        // Get POST data
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');
    
        // Manually validate inputs
        $errors = [];

        if (empty($name)) {
            $errors[] = 'Name is required.';
        } 

        // Check if email is provided and valid
        if (empty($email)) {
            $errors[] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format.';
        }
    
        // Check if password is provided and meets length requirement
        if (empty($password)) {
            $errors[] = 'Password is required.';
        } elseif (strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters long.';
        }
    
        // Check if confirm password is provided and matches password
        if (empty($confirmPassword)) {
            $errors[] = 'Confirm password is required.';
        } elseif ($password !== $confirmPassword) {
            $errors[] = 'Passwords do not match.';
        }
    
        // If there are errors, return JSON response with errors
        if (!empty($errors)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $errors
            ]);
        }
    
       // Check if email already exists
        $existingUser = $this->userModel->where('email', $email)->first();
        if ($existingUser) {
            // Check if the existing user signed up via Google
            if (!empty($existingUser['google_id'])) { // Check if google_id is not null
                return $this->response->setJSON([
                    'status' => 'error',
                    'errors' => ['Email is already registered via Google.']
                ]);
            }
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => ['Email already registered.']
            ]);
        }
    
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        // Save the user
        if (!$this->userModel->save([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
            'email_verify' => 0, // Assuming email verification is required
            'type' => 1 // Default type for email users
        ])) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => ['Error saving user data.']
            ]);
        }
    
        // Return JSON response for success
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Registration successful. Please log in.'
        ]);
    }


    public function forgotPassword()
    {
        $email = $this->request->getPost('email');
    
        // Validate the email
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => ['Please provide a valid email address.']
            ]);
        }
    
        // Check if the email exists in the database
        $user = $this->userModel->where('email', $email)->first();
        if (!$user) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => ['No account found with that email address.']
            ]);
        }
    
        // Generate a password reset token
        $token = bin2hex(random_bytes(50));
    
        // Save the token in the database with an expiry time
        $this->userModel->update($user['uid'], [
            'reset_token' => $token,
            'reset_expires' => date('Y-m-d H:i:s', strtotime('+1 hour')),
        ]);
    
        // Send the reset email
        $resetLink = base_url('/reset-password?token=' . $token);
    
        // Prepare email content
        $subject = 'Password Reset Request';
        $message = "Hello, please click the following link to reset your password: <a href='$resetLink'>$resetLink</a>";

        // Send the email using the sendEmail function
        if ($this->EmailModel->sendEmailForget($email, $subject, $message)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Password reset email sent successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => ['Failed to send password reset email.']
            ]);
        }
    }



    public function resetPassword()
    {
     
        $token = $this->request->getGet('token');

        // Validate the token
        $userModel = new UserModel();
        $user = $userModel->where('reset_token', $token)
                          ->where('reset_expires >=', date('Y-m-d H:i:s'))
                          ->first();

        if (!$user) {
            // Invalid or expired token
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid token'
            ]);
        }

        // Token is valid, show the reset password form
        return view('pages/reset', ['token' => $token, 'title' => 'reset password']);
    }

    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validate the inputs
        $errors = [];
        if (empty($password) || strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters long.';
        }
        if ($password !== $confirmPassword) {
            $errors[] = 'Passwords do not match.';
        }
        if (!empty($errors)) {
            return $this->response->setJSON(['status' => 'error', 'errors' => $errors]);
        }

        // Validate the token
        $userModel = new UserModel();
        $user = $userModel->where('reset_token', $token)
                          ->where('reset_expires >=', date('Y-m-d H:i:s'))
                          ->first();

        if (!$user) {
            return $this->response->setJSON(['status' => 'error', 'errors' => ['Invalid or expired token.']]);
        }

        // Update the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $userModel->update($user['uid'], [
            'password' => $hashedPassword,
            'reset_token' => null,
            'reset_expires' => null,
        ]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Password has been reset successfully.']);
    }

    
    
    

}
