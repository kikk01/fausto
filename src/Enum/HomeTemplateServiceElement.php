<?php

declare(strict_types=1);

namespace App\Enum;

enum HomeTemplateServiceElement {
    case title;
    case subtitle;
    case first_paragraph;
    case second_paragraph;
    case image_pathname;
}