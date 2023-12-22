<?php

namespace App\Http\Controllers;

use App\Models\CourseClass;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PDOException;

class CourseClassController extends Controller
{
    public function index()
    {
        try {
            $classes = CourseClass::with(['course', 'syllabus'])->get();
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
        return response()->json([
            'success' => true,
            'message' => 'all data grabbed',
            'data' => $classes
        ]);
    }

    public function show($id)
    {
        try {
            $classes = CourseClass::with(['course', 'syllabus'])->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'data grabbed',
            'data' => $classes
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'course_id' => 'required',
                'syllabus_id' => 'required',
                'creator_user_id' => 'required',
                'name' => 'required',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors(),
                'data' => null
            ], 400);
        }

        try {
            $class = new CourseClass();

            $class->course_id = $validated['course_id'];
            $class->syllabus_id = $validated['syllabus_id'];
            $class->creator_user_id = $validated['creator_user_id'];
            $class->name = $validated['name'];
            $class->thumbnail_img = $request->thumbnail_img;
            $class->class_code = $request->class_code;

            $class->save();
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'new class created successfully',
            'data' => $class
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        try {
            $class = CourseClass::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'data updated not found',
                'data' => null
            ], 404);
        }

        try {
            $validated = $request->validate([
                'course_id' => 'required',
                'syllabus_id' => 'required',
                'creator_user_id' => 'required',
                'name' => 'required',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors(),
                'data' => null
            ], 400);
        }

        try {
            $class->update([
                'course_id' => $validated['course_id'],
                'syllabus_id' => $validated['syllabus_id'],
                'creator_user_id' => $validated['creator_user_id'],
                'name' => $validated['name'],
                'thumbnail_img' => $request->thumbnail_img,
                'class_code' => $request->class_code,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'course updated successfully',
            'data' => $class
        ], 200);
    }

    public function destroy(string $id)
    {
        try {
            $class = CourseClass::findOrFail($id);
        } catch (PDOException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'data deleted not found',
                'data' => null
            ], 404);
        }

        try {
            $class->delete();
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'class deleted successfully',
            'data' => null
        ], 200);
    }
}
