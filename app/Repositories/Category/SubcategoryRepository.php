<?php
namespace App\Repositories\Category;

use App\Interfaces\Category\SubCategoryInterface;
use App\Models\{Subcategorie,Categorie};

class SubcategoryRepository implements SubCategoryInterface
{
    /** fetch all sub categories */
    public function getCategoryAll()
    {
        return Subcategorie::all();
    }

    /** sub category list with category */
    public function getSubCategoryWithCategory()
    {
        return Subcategorie::with('categorie')->get();
    }

    /** specific category  */
    public function getCategoryById($cateid)
    {
        return Subcategorie::findOrFail($cateid);
    }

    /** create category */
    public function createCategory(array $categoryDetails)
    {
        return Subcategorie::create($categoryDetails);
    }

    /** udpate category */
    public function updateCategory($catid, $newCategoryDetails)
    {
        return Subcategorie::whereId($catid)->update($newCategoryDetails);
    }

    /** delete category */
    public function deleteCategory($catid)
    {
        Subcategorie::destroy($catid);
    }
}

?>