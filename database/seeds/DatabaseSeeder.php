<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('cvs')->insert([

            'name'=>"Luchkovskyi Stas",
            'info'=>'Zaporozhzhye, Ukraine
                        Birth date: 06. april 1986
                        Cell: +38 (099) 000 32 23
                        E-mail:  luca131986@gmail.com',
            'target'=>'Target: position as PHP Developer , Laravel',
            'previousS'=>' JSC ZKMK  master of the Assembly of metal structures	 2012-2015
                           JSC UKRGRAFIT master of repair of equipment	2008-2012 ',
            'skills'=>' PHP, OOP, MVC, LARAVEL,
                        Javascript, jquery, AngularJs,
                        Bootstrap 3,HTML,CSS,
                        Database theory, MYSQL , MS SQL SERVER;
                        MySQL, Mongodb, MS-SQL;
                        Windows Forms, WPF, XAML; C, C# .Net;',
            'education'=>'Computer Academy Step – Software development	2014-Now
                          Zaporizhzhya state engineering Academy – Power System-Specialist	2003-2008',
            'language'=>'English	 intermediate,
                         Russian	native,
                         Ukrainian	native',
            'traits'=>'Goal-oriented, ambitious, insistent, patient, responsible, sociable,educable.',
            'interests'=>'Music, IT-technologies, football.'

        ]);
    }
}
