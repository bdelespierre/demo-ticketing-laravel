<?php

use App\Models\TicketPriority;
use App\Models\TicketStatus;
use App\Models\TicketType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @phpcs:disable PSR1.Classes.ClassDeclaration
 */
class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->string('type')->default((string) TicketType::feature());
            $table->string('status')->default((string) TicketStatus::open());
            $table->string('priority')->default((string) TicketPriority::normal());
            $table->string('title');
            $table->text('description');
            $table->string('page_url')->nullable();
            $table->string('browser')->nullable();
            $table->string('operating_system')->nullable();
            $table->timestamps();

            $table->foreign('owner_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
