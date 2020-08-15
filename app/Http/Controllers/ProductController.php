<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Validator;

class ProductController extends Controller
{
    public function addFields() {
        return view("dynamic-fields");
    }
    public function postAddFields(Request $request) {
        $inputData = Input::except('_token');
        for($i=0; $i<count($inputData['image']); $i++) {
            $data['image'] = $inputData['image'][$i];
            $saveData = new DynamicFields($data);
            $saveData->save();
        }
        return back()->with('success', 'Record Created Successfully.');
    }
    public function getCloneFields() {
        $input = Input::all();
        $id = $input['div_count'];
        $varId = 'removeId'. $id;
        $data = '
        <div class="clonedInput" id="'. $varId .'">
            <div class="row" id="clonedInput">
                <div class="col-md-8">
                    <input type="file" name="image[]" id="image'. $id .'" class="form-control-file" required>
                    <label class="control-label col-md-8"></label>
                </div>
            </div>
        </div>
        ';
        echo json_encode($data);
    }
        // $product = new Product();

        // if($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $fileName = time() . '.' .$extension;
        //     $file->move('uploads/images/', $fileName);
        //     $item->image = $fileName;
        // }   else {
        //     return $request;
        //     $item->image = ' ';
        // }


        // $item->save();

        // return redirect('/')->with('status', 'Order collected');
}
