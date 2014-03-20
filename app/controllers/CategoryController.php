<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get all the categories
		$categories = Category::all();
		// load the view and pass the categories
		return View::make('categories.index')->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/categories/create.blade.php)
		return View::make('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'category'       => 'required',
			'description'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('categories/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$category = new Category;
			$category->category       = Input::get('category');
			$category->description    = Input::get('description');
			$category->save();

			// redirect
			Session::flash('message', 'Successfully created category!');
			return Redirect::to('categories');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// get the category
		$category = Category::find($id);

		// show the view and pass the category to it
		return View::make('categories.show')
			->with('category', $category);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the category
		$category = Category::find($id);

		// show the edit form and pass the category
		return View::make('categories.edit')
			->with('category', $category);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		$rules = array(
			'category'       => 'required',
			'description'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the update
		if ($validator->fails()) {
			return Redirect::to('categories/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$category = Category::find($id);
			$category->category       = Input::get('category');
			$category->description      = Input::get('description');
			$category->save();

			// redirect
			Session::flash('message', 'Successfully updated category!');
			return Redirect::to('categories');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$category = Category::find($id);
		$category->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the category!');
		return Redirect::to('categories');
	}

}
