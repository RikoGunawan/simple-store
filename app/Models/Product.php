<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'retail_price',
        'wholesale_price',
        'min_wholesale_qty',
        'quantity',
        'photo'
    ];

    //Tambahan dari Category.php untuk relasi ke Product
    //Function Penghubung ke tabel category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user');
    }

    //Function untuk mengubah huruf pertama menjadi huruf besar GETTER
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    //Function untuk mengubah huruf pertama menjadi huruf kecil SETTER
    //tapi tidak akan bekerja pada project ini karena kita pakai Mass Assignment (product->all())
    public function setNameAttribute($value)
    {
        return strtolower($value);
    }

    //Untuk membuat kolom custom (tidak ada di database aslinya)
    protected $appends = [
        'test'
    ];

    //GETTER
    public function getTestAttribute(){
        return "Ini adalah text";
    }
}
