<?php

namespace App\Filament\CustomFields;

use Filament\Forms\Components\RichEditor;

class BasicEditorField
{
    public static function richEditorWithBasicToolbar(string $name): RichEditor
    {
        return RichEditor::make($name)
            ->toolbarButtons([
                'bold',
                'bulletList',
                'italic',
                'link',
                'orderedList',
                'redo',
                'strike',
                'underline',
                'undo',
            ]);
    }
}
