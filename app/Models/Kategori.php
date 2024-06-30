<?php 

namespace App\Models;
// use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;


class Kategori extends Model
{
    /**
     * @var string
     */
    protected $table = 'public.table_kategori';

    /**
     * @var array
     */
    protected $fillable = ['kategori','created_by','modified_by','status'];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    static $rules = [];
}
