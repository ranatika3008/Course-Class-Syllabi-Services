<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PDOException;

class CourseController extends Controller
{
    public function index() {
        try {
            $courses = Course::all();
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
            'data'=>$courses
        ]);
    }

    public function show($id) {
        try {
            $course = Course::findOrFail($id);
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
                'creator_user_id'=>'required',
                'name'=>'required',
                'code'=>'required',
                'course_credit'=>'required',
            ]);
        
        } catch (ValidationException $e) {
            return response()->json([
                'success'=>false,
                'message'=>$e->errors(),
                'data'=>null
            ], 400);
        }

        try {
            $course = new Course();
            
            $course->creator_user_id = $validated['creator_user_id'];
            $course->name = $validated['name'];
            $course->code = $validated['code'];
            $course->course_credit = $validated['course_credit'];
            $course->lab_credit = $request->lab_credit;
            $course->type = $request->type;
            $course->short_description = $request->short_description;
            $course->minimal_requirement = $request->minimal_requirement;
            $course->study_material_summary = $request->study_material_summary;
            $course->learning_media = $request->learning_media;
            
            $course->save();
        
        } catch (Exception $e) {
            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage(),
                'data'=>null
            ], 422);
        }

        return response()->json([
            'success'=>true,
            'message'=>'new course created successfully',
            'data'=>$course
        ], 201);
    }

    public function update(Request $request, string $id) {
        try {
            $course = Course::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success'=>false,
                'message'=>'data updated not found',
                'data'=>null
            ], 404);
        }
        
        try {
            $validated = $request->validate([
                'creator_user_id'=>'required',
                'name'=>'required',
                'code'=>'required',
                'course_credit'=>'required',
            ]);
        
        } catch (ValidationException $e) {
            return response()->json([
                'success'=>false,
                'message'=>$e->errors(),
                'data'=>null
            ], 400);
        }

        try {
            $course->update([
                'creator_user_id' => $validated['creator_user_id'],
                'name' => $validated['name'],
                'code' => $validated['code'],
                'course_credit' => $validated['course_credit'],
                'lab_credit' => $request->lab_credit,
                'type' => $request->type,
                'short_description' => $request->short_description,
                'minimal_requirement' => $request->minimal_requirement,
                'study_material_summary' => $request->study_material_summary,
                'learning_media' => $request->learning_media
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
            'data'=>$course
        ], 200);
    }

    public function destroy(string $id) {
        try {
            $course = Course::findOrFail($id);
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
            $course->delete();
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
