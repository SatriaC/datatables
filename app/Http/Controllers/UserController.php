<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        # code...
        if (request()->ajax()) {
            $query = User::query();

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                <div class="btn-group">
                    <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                    </div>
                </div>
                ';
            })
            ->editColumn('status', function($item){
                return $item->status == 1 ? 'Aktif' : 'Tidak Aktif';
            })
            ->rawColumns(['action', 'status'])
            ->make();

        }

        return view('pages.user.index');
    }
}
