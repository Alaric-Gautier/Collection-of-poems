<?php

namespace App\Controller\Admin;

use App\Entity\Poem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PoemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Poem::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title');

        yield TextField::new('image');

        yield SlugField::new('slug')
            ->setTargetFieldName('title');

        yield TextEditorField::new('content');

        yield TextField::new('featuredText');

        yield DateTimeField::new('createdAt')
            ->hideOnForm();

        yield DateTimeField::new('updatedAt')
            ->hideOnForm();



    }

}
