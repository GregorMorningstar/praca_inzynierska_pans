<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class OrderUser extends Model
{
    use HasFactory;

    // Ustawienie, czy model powinien zarządzać kolumnami timestamps
    public $timestamps = true;

    // Definicje właściwości fillable, jeśli potrzebne (na przykład do masowego przypisywania)
    protected $fillable = [
        'order_id',
        'user_id',
        'assigned_at', // Przykład dodatkowej kolumny z datą przypisania
    ];

    // Definicja relacji z modelem Order
    public function order()
    {
        return $this->belongsTo(Orders::class); // Popraw odwołanie do klasy Order
    }

    // Definicja relacji z modelem User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
