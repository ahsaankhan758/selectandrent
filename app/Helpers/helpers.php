<?php

use App\Models\ActivityLog;
use Illuminate\Support\Facades\File;
    function activityLog($user_id = 0,$description = '',$action = '',$module = '')
        {
            ActivityLog::create([
                'user_id' => $user_id,
                'action' => $action,
                'module' => $module,
                'description' => serialize($description),
            ]);
        }
        // function setEnvironmentValue($key, $value)
        //     {
        //         $envPath = base_path('.env');

        //         if (File::exists($envPath)) {
        //             $envContent = File::get($envPath);
        //             $keyPattern = "/^" . preg_quote($key, '/') . "=.*/m";

        //             if (preg_match($keyPattern, $envContent)) {
        //                 // Update existing key
        //                 $envContent = preg_replace($keyPattern, "{$key}={$value}", $envContent);
        //             } else {
        //                 // Append new key
        //                 $envContent .= "\n{$key}={$value}\n";
        //             }

        //             // Write back to the file
        //             File::put($envPath, $envContent);
        //         }
        //     }
            // function setEnvironmentValue($key, $value)
            // {
            //     $envPath = base_path('.env');

            //     if (File::exists($envPath)) {
            //         $envContent = File::get($envPath);
            //         $keyPattern = "/^" . preg_quote($key, '/') . "=.*/m";

            //         if (preg_match($keyPattern, $envContent)) {
            //             // Update existing key
            //             $envContent = preg_replace($keyPattern, "{$key}={$value}", $envContent);
            //         } else {
            //             // Append new key
            //             $envContent .= "\n{$key}={$value}\n";
            //         }

            //         // Write back to the file
            //         File::put($envPath, $envContent);

            //         // ✅ Update Laravel config dynamically
            //         Config::set($key, $value);

            //         // ✅ Clear config cache only (NO full restart)
            //         Artisan::call('config:clear');
            //     }
            // }

