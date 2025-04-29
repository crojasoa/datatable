<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Article;
// Removed duplicate import
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class ArticleTable extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setDefaultSort('id', 'asc');
        $this->setSingleSortingDisabled();

       // $this->setDefaultStort('sort', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make('id')
            ->sortable(fn($query, $direction) => $query->orderBy('id', $direction) ),
            Column::make('Autor', 'user.name')
            ->sortable()
            ->searchable(),
            Column::make('Titulo','title')
            ->sortable()
            ->searchable(),
            Column::make('Fecha creación', 'created_at')
            ->sortable()
            ->searchable(),
            Column::make('Fecha creación','created_at')->sortable(),


            ImageColumn::make('Imagen')
                ->location(fn() => 'https://img.freepik.com/psd-premium/icono-youtube-aislado-sobre-fondo-blanco-boton-reproducir-video-audio-logotipo-aplicacion-redes-sociales_989822-4743.jpg' ),

            ButtonGroupColumn::make('Action')
                ->buttons([

                    LinkColumn::make('Action')
                    ->title(fn() => 'Ver')
                    ->location(fn($row) => route('welcome', [
                        'prueba' => $row->id
                    ]))
                    ->attributes(fn() => [
                        'class' => 'btn btn-green'
                    ] ),

                    LinkColumn::make('Action')
                    ->title(fn() => 'Editar')
                    ->location(fn($row) => route('welcome', [
                        'prueba' => $row->id
                    ]))
                    ->attributes(fn() => [
                        'class' => 'btn btn-blue'
                    ] )
                ])



            
        ];
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        return Article::query()
                    ->with('user');
    }
}
