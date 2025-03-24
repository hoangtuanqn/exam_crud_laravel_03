<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('PhoneBrand', function (Blueprint $table) {
            $table->increments('pbid');
            $table->string('name', 50);
            $table->string('country', 50);
            $table->string('logo', 200);
        });
        
        // Chèn dữ liệu mẫu
        DB::table('PhoneBrand')->insert([
            [
                'name' => 'OnePlus',
                'country' => 'China',
                'logo' => 'brand/OnePlus42-b_36.jpg',
            ],
            [
                'name' => 'Oppo',
                'country' => 'China',
                'logo' => 'brand/Oppo.jpg',
            ],
            [
                'name' => 'Samsung',
                'country' => 'South Korea',
                'logo' => 'brand/Samsung.jpg',
            ],
            [
                'name' => 'Vsmart',
                'country' => 'Vietnam',
                'logo' => 'brand/Vsmart.jpg',
            ],
            [
                'name' => 'iPhone',
                'country' => 'USA',
                'logo' => 'brand/iPhone.jpg',
            ],
            [
                'name' => 'Masstel',
                'country' => 'Vietnam',
                'logo' => 'brand/Masstel42-b_0.png',
            ],
            [
                'name' => 'Nokia',
                'country' => 'Finland',
                'logo' => 'brand/Nokia.jpg',
            ],
        ]);
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
