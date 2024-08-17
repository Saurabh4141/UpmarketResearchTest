<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Exception;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try {
            return view('User.create');
        } catch (Exception $e) {
            return view('errors.500');
        }
    }

    public function createUserForm(Request $request)
    {
        try {
            $name = $request->name;

            if (empty($name)) {
                return response()->json(['error' => 'Name is empty or undefined..!']);
            }
            $path = public_path('jsons');
            if (!dir($path)) {
                mkdir($path, true);
            }
            $filename = date('Y_m_d_his') . '.json';
            $json = json_encode([
                "name" => $name,
                "designation" => $request->designation ?? null,
                "age" =>  $request->age ?? null,
                "location" =>  $request->location ?? null,
                "joining_date" =>  $request->joining_date ?? null,
                "roles" =>  $request->roles ?? [],
                "isDeleted" =>  false
            ]);

            $jsonFilePath = $path . '/' . $filename;
            File::put($jsonFilePath, $json);

            return response()->json(['success' => 'User created successfully.']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong.!']);
        }
    }

    public function view(Request $request)
    {
        try {
            return view('User.index');
        } catch (Exception $e) {
            return view('errors.500');
        }
    }

    public function list(Request $request)
    {
        try {
            $path = public_path('jsons');
            $files = File::files($path);
            $showData = [];
            foreach ($files as $file) {
                $fileContents = File::get($file);
                $jsonData = json_decode($fileContents);
                if (!empty($jsonData) && empty($jsonData->isDeleted)) {
                    $jsonData->filename = $file->getFilename();
                    $showData[] = $jsonData;
                }
            }
            return view('User.table.list', compact('showData'));
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong.!']);
        }
    }

    public function update(Request $request)
    {
        try {
            $filename = $request->filename;
            if (empty($filename)) {
                return response()->json(['error' => 'Filename is empty or undefined..!']);
            }
            $path = public_path('jsons') . '/' . $filename;
            $fileContents = File::get($path);
            $data = json_decode($fileContents);
            $data->filename = $filename;
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Invalid JSON in file: ' . $filename);
            }

            return view('modal.updateUserModal', compact('data'));
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong.!']);
        }
    }

    public function updateForm(Request $request)
    {
        try {
            $filename = $request->filename;
            $name = $request->name;
            if (empty($filename)) {
                return response()->json(['error' => 'Filename is empty or undefined..!']);
            }
            if (empty($name)) {
                return response()->json(['error' => 'Name is empty or undefined..!']);
            }
            $path = public_path('jsons');
            if (!dir($path)) {
                mkdir($path, true);
            }
            File::delete($path . '/' . $filename);
            $json = json_encode([
                "name" => $name,
                "designation" => $request->designation ?? null,
                "age" =>  $request->age ?? null,
                "location" =>  $request->location ?? null,
                "joining_date" =>  $request->joining_date ?? null,
                "roles" =>  $request->roles ?? []
            ]);

            $jsonFilePath = $path . '/' . $filename;
            File::put($jsonFilePath, $json);

            return response()->json(['success' => 'User updated successfully.']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong.!']);
        }
    }

    public function delete(Request $request)
    {
        try {
            $filename = $request->filename;
            if (empty($filename)) {
                return response()->json(['error' => 'Filename is empty or undefined..!']);
            }
            $path = public_path('jsons');
            $filePath = $path . '/' . $filename;
            $fileContents = File::get($filePath);
            $data = json_decode($fileContents);
            $data->isDeleted = true;
            File::put($filePath, json_encode($data));

            return response()->json(['success' => 'User deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong.!']);
        }
    }

    public function permanentdelete(Request $request)
    {
        try {
            $arr_filename = $request->arr_filename;
            if (empty($arr_filename) || empty($arr_filename[0])) {
                return response()->json(['error' => 'Please select checkbox to proceed..!']);
            }

            foreach ($arr_filename as $key => $filename) {
                $path = public_path('jsons');
                $filePath = $path . '/' . $filename;
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }

            return response()->json(['success' => 'Selected json deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong.!']);
        }
    }
}
