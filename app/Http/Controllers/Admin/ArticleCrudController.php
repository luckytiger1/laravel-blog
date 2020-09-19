<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ArticleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Article::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/article');
        CRUD::setEntityNameStrings('article', 'articles');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title');
        CRUD::column('description');
//        CRUD::column('user_id');
//        $this->crud->setColumnDetails('user_id', ['attribute' => 'name']);
        CRUD::addColumn([
            'name' => 'author',
            'type' => 'relationship',
            'label' => 'Author',
        ]);


//        CRUD::setFromDb(); // columns
//        CRUD::addColumn(['name' => 'tags', 'type' => 'relationship']);
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        $this->setupListOperation();
        CRUD::column('tags');
        CRUD::column('body');
        CRUD::column('background');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ArticleRequest::class);


        CRUD::field('title');
        CRUD::field('description');
        CRUD::field('body');

        CRUD::addField([
            'name' => 'user_id',
            'label' => "Author",
            'type' => 'select2',
            'entity' => 'author',
            'model' => "App\Models\User", // related model
            'attribute' => 'name',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

//        CRUD::field('background');
        CRUD::addField([   // Upload
            'name' => 'background',
            'label' => 'Background',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public', // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
            // optional:
//            'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URL's this will make a URL that is valid for the number of minutes specified
        ]);

        CRUD::addField([
            'label' => "Tags",
            'type' => 'select2_multiple',
            'name' => 'tags', // the method that defines the relationship in your Model
            'entity' => 'tags', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);


        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
