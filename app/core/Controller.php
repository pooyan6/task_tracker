<?php

class Controller
{
    protected function view(string $view, array $data = []): void
    {
        // تمام متغیرها رو به صورت متغیر معمولی در ویو در دسترس می‌کنیم
        extract($data);

        // این اسم ویوئیه که داخل layout لود می‌کنیم
        $contentView = $view;

        // layout عمومی
        require __DIR__ . '/../views/layout.php';
    }
}
