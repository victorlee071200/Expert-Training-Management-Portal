<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\program\program;
use App\Helpers\CurrencyHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Userprogram\Userprogram;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index() {
        $meta_title = "programs";
        $programs = program::orderBy('id', 'DESC')->paginate(5);
        $currency = CurrencyHelper::getCurrencyString();
        return view('admin.programs.index', compact('meta_title', 'programs', 'currency'));
    }

    public function create() {
        $meta_title = "Create New programs";
        return view('admin.programs.create', compact('meta_title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'program_title' => ['required', 'string', 'max:1000', 'unique:programs,title'],
            'short_description' => ['nullable', 'string', 'max:10000'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:1999'],
            'program_price' => ['required', 'numeric', 'min:1'],
        ]);

        if( $validator->fails() )
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $program = new program;
        $program->name = $request->name;
        $program->code = $request->code;
        $program->type = $request->type;
        $program->name = $request->name;
        $program->length = $request->length;
        $program->price = $request->price;
        $program->slug = Str::slug($request->name);
        $program->price = $request->price;
        $program->option = $request->option;
        $program->description = $request->description;
        $program->status = 'to-be-confirmed';


        $name = $request->file('thumbnail')->getClientOriginalName();
        $request->file('thumbnail')->storeAs(
            'public/program_thumbnails/', $name
        );
        $program->thumbnail_path = $name;

        $program->save();

        // if( $request->hasFile('cover_image')  )
        // {
        //     $file = $request->file('cover_image');
        //     $extension = $file->getClientOriginalExtension();
        //     $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        //     $fileNameToStore = $originalFileName . '_' . $program->id . '.' . $extension;
        //     $destinationPath = public_path() . "/uploads/images";
        //     $uploadIsSuccessful = $file->move($destinationPath, $fileNameToStore);
        //     if($uploadIsSuccessful) { $program->image = $fileNameToStore; }
        //     $program->save();
        // }

        return redirect()->route('admin.programs')->with('successMsg', 'The program has been successfully created!');
    }

    public function edit($programId)
    {
        $program = DB::table('programs')->find($programId);
        if(is_null($program))
        {
            abort(403, 'The program has not been found!');
        }
        $meta_title = "Edit a program";
        return view('admin.programs.edit', compact('meta_title', 'program'));
    }

    public function update(Request $request, $programId)
    {
        $program = program::findOrFail($programId);

        $validator = Validator::make($request->all(), [
            'program_title' => ['required', 'string', 'max:1000', 'unique:programs,title,' . $programId],
            'short_description' => ['nullable', 'string', 'max:10000'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:1999'],
            'program_price' => ['required', 'numeric', 'min:1'],
        ]);

        if( $validator->fails() )
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $program->title = $request->program_title;
        $program->slug = Str::slug($request->program_title);
        $program->description = $request->short_description;
        $program->price = $request->program_price;

        if( $request->hasFile('cover_image')  )
        {
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $fileNameToStore = $originalFileName . '_' . $program->id . '.' . $extension;
            $destinationPath = public_path() . "/uploads/images";

            $fileExists = file_exists($destinationPath . '/' . $program->image);
            $isFile = is_file($destinationPath . '/' . $program->image);
            if ( $fileExists && $isFile )
            {
                $fileDeleted = unlink($destinationPath . '/' .$program->image);
            }

            $uploadIsSuccessful = $file->move($destinationPath, $fileNameToStore);
            if($uploadIsSuccessful) { $program->image = $fileNameToStore; }
        }

        $program->save();

        return redirect()->route('admin.programs')->with('successMsg', 'The program has been successfully updated!');
    }

    public function destroy(Request $request, $programId)
    {
        $program = Program::find($programId);
        if(is_null($program))
        {
            return redirect()->route('admin.programs')->with('failureMsg', 'The program with the following id could NOT be deleted: ' . $programId);
        }

        $userprograms = UserProgram::where('program_id', $program->id)->get();
        foreach($userprograms as $item)
        {
            $item->delete();
        }

        $program->delete();

        return redirect()->route('admin.programs')->with('successMsg', 'The program with the following id has been successfully deleted: ' . $programId);
    }
}
