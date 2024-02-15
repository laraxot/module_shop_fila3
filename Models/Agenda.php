<?php

declare(strict_types=1);

namespace Modules\Shop\Models;

/**
 * Modules\Shop\Models\Agenda.
 *
 * @property int                             $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string                          $name
 * @property string|null                     $description
 * @property string                          $start_date
 * @property string                          $end_date
 * @property string                          $email
 * @property string|null                     $note
 * @property string                          $link
 * @property int|null                        $user_id
 *
 * @method static \Modules\Shop\Database\Factories\AgendaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda   whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Agenda extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
        'start_date', 'end_date',
        'email',
        'note',
        'link',
        'user_id',
    ];
}
