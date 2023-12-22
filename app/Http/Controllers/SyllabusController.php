<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PDOException;

class SyllabusController extends Controller
{
    public function index() {
        try {
            $syllabi = Syllabus::with('course')->get();
            
        } catch (Exception $e) {
            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage(),
                'data'=>null
            ], 500);
        }
        return response()->json([
            'success'=>true,
            'message'=>'all data grabbed',
            'data'=>$syllabi
        ]);
    }

    public function show($id) {
        try {
            $course = Syllabus::with('course')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success'=>false,
                'message'=>'data not found',
                'data'=>null
            ], 404);
        }

        return response()->json([
            'success'=>true,
            'message'=>'data grabbed',
            'data'=>$course
        ]);
    }

    public function store(Request $request) {
        try {
            $validated = $request->validate([
                'course_id'=>'required',
                'title'=>'required',
            ]);
        
        } catch (ValidationException $e) {
            return response()->json([
                'success'=>false,
                'message'=>$e->errors(),
                'data'=>null
            ], 400);
        }

        try {
            $Syllabus = new Syllabus();
            
            $Syllabus->course_id = $validated['course_id'];
            $Syllabus->title = $validated['title'];
            $Syllabus->author = $request->author;
            $Syllabus->head_of_study_program = $request->head_of_study_program;

            $Syllabus->save();

        } catch (Exception $e) {
            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage(),
                'data'=>null
            ], 422);
        }

        return response()->json([
            'success'=>true,
            'message'=>'new syllabus created successfully',
            'data'=>$Syllabus
        ], 201);
    }

    public function update(Request $request, string $id) {
        try {
            $syllabus = Syllabus::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success'=>false,
                'message'=>'data updated not found',
                'data'=>null
            ], 404);
        }
        
        try {
            $validated = $request->validate([
                'course_id'=>'required',
                'title'=>'required',
            ]);
        
        } catch (ValidationException $e) {
            return response()->json([
                'success'=>false,
                'message'=>$e->errors(),
                'data'=>null
            ], 400);
        }

        try {
            $syllabus->update([
                'course_id' => $validated['course_id'],
                'title' => $validated['title'],
                'author' => $request->author,
                'head_of_study_program' => $request->head_of_study_program
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage(),
                'data'=>null
            ], 422);
        }

        return response()->json([
            'success'=>true,
            'message'=>'course updated successfully',
            'data'=>$syllabus
        ], 200);
    }

    public function destroy(string $id) {
        try {
            $syllabus = Syllabus::findOrFail($id);
        } catch (PDOException $e) {
            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage(),
                'data'=>null
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'success'=>false,
                'message'=>'data deleted not found',
                'data'=>null
            ], 404);
        }
        
        try {
            $syllabus->delete();
        } catch (Exception $e) {
            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage(),
                'data'=>null
            ], 500);
        }

        return response()->json([
            'success'=>true,
            'message'=>'course deleted successfully',
            'data'=>null
        ], 200);
    }
}
