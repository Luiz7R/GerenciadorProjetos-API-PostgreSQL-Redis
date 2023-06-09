<?php

namespace App\Filament\Pages;

use Filament\Facades\Filament;
use Filament\Pages\Page;

class MyProfile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.my-profile';

    public $user;
    public $userData;
    protected $loginColumn;

    public function boot()
    {
        // user column
        $this->loginColumn = config('filament-breezy.fallback_login_field');
    }
 
    public function mount()
    {
        $this->user = Filament::auth()->user();
        $this->updateProfileForm->fill($this->user->toArray());
    }

    protected function getForms(): array
    {
        return array_merge(parent::getForms(), [
            "updateProfileForm" => $this->makeForm()
                ->model(config('filament-breezy.user_model'))
                ->schema($this->getUpdateProfileFormSchema())
                ->statePath('userData'),
  
            "updatePasswordForm" => $this->makeForm()->schema(
                $this->getUpdatePasswordFormSchema()
            )
        ]);
    }


}
