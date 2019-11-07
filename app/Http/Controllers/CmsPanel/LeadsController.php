<?php

namespace App\Http\Controllers\CmsPanel;

use Illuminate\Http\Request;
use \App\Helpers\BaseCmsPanelController;

use App\Models\Leads;
use App\Http\Requests\CmsPanel\LeadsRequest;


class LeadsController extends BaseCmsPanelController
{
    public function __construct()
    {
        parent::__construct();
        $this->mainModel = new \App\Models\Leads;
    }


    public function index(Request $request)
    {
        $leads_list = $this->mainModel->getAnyList((isset($request->deleted)), $this->perPage);
        return view('cms_panel.leads.index',  compact('leads_list'));
    }


    public function create(Request $request)
    {

        return view('cms_panel.leads.form');
    }


    public function store(LeadsRequest $request)
    {
        $this->mainModel->create($request->validated());
        return redirect()->route('cms_panel.leads.index', [])->with('success', __('cms_panel.created_successfully'));
    }


    public function edit(Request $request, $id)
    {
        $leads_row = $this->mainModel->getRowWithTrashed($id);
        return view('cms_panel.leads.form', compact('leads_row'));
    }


    public function update(LeadsRequest $request, $id)
    {
        $this->mainModel->getRowWithTrashed($id)->update($request->validated());
        return redirect()->route('cms_panel.leads.index', [])->with('success', __('cms_panel.updated_successfully'));
    }
}
