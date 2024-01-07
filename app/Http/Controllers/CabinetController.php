<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Contracts\View\View;

class CabinetController extends Controller
{
    // Директория с шаблонами страниц
    const PAGE_TEMPLATE_DIRECTORY = 'cabinet.pages';

    private $templateParams = [];

    /**
     * Главная страница личного кабинета
     * @return View
     */
    public function index(): View
    {
        $activePage = [
            'href' => route('cabinet_index'),
            'title' => __('Dashboard'),
        ];
        $this->addTemplateParam('activePage', $activePage);

        return $this->view('index');
    }

    /**
     * Счета
     * @return View
     */
    public function wallets(): View
    {
        $activePage = [
            'href' => route('cabinet_wallets'),
            'title' => __('Wallets'),
        ];
        $this->addTemplateParam('activePage', $activePage);

        return $this->view('wallets');
    }

    private function view(string $templateName)
    {
        $template = self::PAGE_TEMPLATE_DIRECTORY . '.' . $templateName;
        return view($template, $this->getTemplateParams());
    }

    /**
     * Добавляет переменную в массив переменных для шаблона
     * @param $key
     * @param $value
     * @return void
     */
    private function addTemplateParam($key, $value)
    {
        if (isset($this->templateParams[$key])) {
            if (is_array($this->templateParams[$key])) {
                // Если массив - допишем
                $this->templateParams[$key] = array_merge($this->templateParams[$key], $value);
                return;
            }
        }

        $this->templateParams[$key] = $value;
    }

    /**
     * Массив переменных для текущего шаблона
     * @return array
     */
    private function getTemplateParams(): array
    {
        // Добавим текущего пользователя
        if (!isset($this->templateParams['user'])) {
            $this->addTemplateParam('user', User::getCurrentUser());
        }

        return $this->templateParams;
    }

}
