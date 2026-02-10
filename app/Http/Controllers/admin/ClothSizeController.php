<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClothSize;
use Illuminate\Support\Facades\Validator;

class ClothSizeController extends Controller
{
    public function index()
    {
        $clothsizes = ClothSize::orderBy('id','desc')->paginate(15); 
        return view('admin.clothsize.clothsizelisting', compact('clothsizes'));
    }

    public function create()
    {
        return view('admin.clothsize.addclothsize'); 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'name'=>'required',
            'size_from' => 'required',
            'size_to' => 'required',
            'month_year1' => 'required',
            'month_year2' => 'required',
            'name_text' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        $name = $sizeFrom = $sizeTo = '';
        if(isset($request->size_from)){
            $name .= $request->size_from;
            $sizeFrom .= $request->size_from;
        } 
        if(isset($request->month_year1)){
            $name .= ' '.ucfirst($request->month_year1);
            $sizeFrom .= ' '.$request->month_year1;
        }
        if(isset($request->size_to)){
            $name .= ' To '.$request->size_to;
            $sizeTo .= $request->size_to;
        }  
        if(isset($request->month_year2)){
            $name .= ' '.ucfirst($request->month_year2);
            $sizeTo .= ' '.$request->month_year2;
        }

        $clothsize = new ClothSize();
        $clothsize->name = $name;
        $clothsize->size_from = $sizeFrom;
        $clothsize->size_to = $sizeTo;
        $clothsize->name_text = $request->name_text;

        $clothsize->save();
        return redirect()->route('clothsize.index')->with('success','Cloth Size added successfully.');
    }

    public function edit($id)
    {
        $clothsize = ClothSize::findOrFail($id);
        // [$sizeFromValue, $monthYear1] = explode(' ', $clothsize->size_from);
        // [$sizeToValue, $monthYear2]   = explode(' ', $clothsize->size_to);
        
        return view('admin.clothsize.editclothsize', compact('clothsize'/*, 'sizeFromValue', 'monthYear1', 'sizeToValue', 'monthYear2'*/));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            //'name'=>'required',
            'size_from' => 'required',
            'size_to' => 'required',
            'month_year1' => 'required',
            'month_year2' => 'required',
            'name_text' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        $name = $sizeFrom = $sizeTo = '';
        if(isset($request->size_from)){
            $name .= $request->size_from;
            $sizeFrom .= $request->size_from;
        } 
        if(isset($request->month_year1)){
            $name .= ' '.ucfirst($request->month_year1);
            $sizeFrom .= ' '.$request->month_year1;
        }
        if(isset($request->size_to)){
            $name .= ' To '.$request->size_to;
            $sizeTo .= $request->size_to;
        }  
        if(isset($request->month_year2)){
            $name .= ' '.ucfirst($request->month_year2);
            $sizeTo .= ' '.$request->month_year2;
        }

        $clothsize = ClothSize::findOrFail($id);
        $clothsize->name = $name;
        $clothsize->size_from = $sizeFrom;
        $clothsize->size_to = $sizeTo;
        $clothsize->name_text = $request->name_text;

        $clothsize->save();
        return redirect()->route('clothsize.index')->with('success','Cloth Size updated successfully.');
    }

    public function destroy($id)
    {
        $clothsize = ClothSize::findOrFail($id);
        $clothsize->delete(); 
        return redirect()->back()->with('success','Cloth Size deleted successfully.');
    }
}
