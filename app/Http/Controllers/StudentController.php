<?php


namespace App\Http\Controllers\API;





use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;  // Import Student model



class StudentController extends Controller
{
    // GET /students
    public function index()
    {
        return response()->json(['message' => 'GET all students']);
    }

    // POST /students
    public function store(Request $request)
    {
        return response()->json([
            'message' => 'Student created',
            'data' => $request->all()
        ]);
    }

    // PUT /students/{id}
    public function update(Request $request, $id)
    {
        return response()->json([
            'message' => "Student with ID $id updated",
            'data' => $request->all()
        ]);
    }

    // DELETE /students/{id}
    public function destroy($id)
    {
        return response()->json([
            'message' => "Student with ID $id deleted"
        ]);
    }
}


class StudentController extends Controller
{
    public function index()
    {
        // Return all students
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request)
{
    // store logic
    return response()->json(['message' => 'Student created'], 201);
}


    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        $validated = $request->validate([
            'name'         => 'sometimes|string|max:255',
            'email'        => 'sometimes|string|email|unique:students,email,' . $id,
            'username'     => 'sometimes|string|unique:students,username,' . $id . '|max:255',
            'password'     => 'sometimes|string|min:6',
            'profile_image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_status'  => 'sometimes|in:active,inactive',
        ]);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/profile_images'), $imageName);
            $validated['profile_image'] = $imageName;
        }

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $student->update($validated);

        return response()->json($student);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully']);
    }
}
