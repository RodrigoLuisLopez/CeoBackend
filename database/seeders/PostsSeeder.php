<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'titulo' => 'primer_post',
            'subtitulo' => 'subtitulo_post',
            'contenido' => 'contenido_post contenido_post contenido_post contenido_postcontenido_post contenido_post contenido_post contenido_post',
            'usuario_id' => 1,
            'privacidad_id' => 1,
            'estado_id' => 1
        ]);
        
        DB::table('posts')->insert([
            'titulo' => 'segundo_post',
            'subtitulo' => 'subtitulo_post',
            'contenido' => 'SpaceX considered its first high-altitude Starship launch test a success despite the explode-y landing, but the FAA was reportedly not amused. It said that SpaceX violated the terms of its launch license, triggering an investigation and delaying the next test originally scheduled for January 28th. However, it looks like the two parties have patched things up, as SpaceX has announced that it will attempt its second high-altitude Starship test as early as today, February 2nd.

            Starship serial number 9 (SN9) will attempt an ascent to 10 km in height (32,000 feet) before switching to its header landing propellant tanks. It will then reorient itself for reentry and start a controlled aerodynamic descent, moving the two forward and two aft flaps with the onboard flight computer. Closer to the ground, the SN9’s raptor engines will reignite as SN9 attempts another landing flip before (hopefully) touching down on the landing pad next to the launch mount.
            
            There will be a live feed of the flight test available here that will start a few minutes prior to liftoff. Given the dynamic schedule of development testing, stay tuned to our social media channels for updates as we move toward SpaceX’s second high-altitude flight test of Starship!
            
            This is much like what SN8 did successfully, apart from the “touching down” part. Those maneuvers, “combined with in-space refilling, are critical to landing Starship at destinations across the solar system where prepared surfaces or runways do not exist, and returning to Earth,” SpaceX wrote.
            
            It’s not clear what SpaceX did wrong that violated its license. At the time, the FAA said it “will not compromise its responsibility to protect public safety,” adding that “we will approve the modification only after we are satisfied that SpaceX has taken the necessary steps to comply with regulatory requirements.”
            
            SpaceX boss Elon Musk said on Twitter that the “FAA space division has a fundamentally broken regulatory structure” and that “under [their] rules, humanity will never go to Mars.” In fact, the FAA actually did recently streamline its commercial space launch regulations, but the new rules won’t go into effect until early March. In the meantime, Musk recently tweeted that he would be “off Twitter for a while.”
            
            In any case, the next test could happen as early as today. SpaceX said that it would make a live feed of the test flight available on its website “a few minutes prior to liftoff,” and advised that you “stay tuned to its social media channels for updates.”',
            'usuario_id' => 1,
            'privacidad_id' => 1,
            'estado_id' => 1
        ]);
        
        DB::table('posts')->insert([
            'titulo' => 'tercer_post',
            'subtitulo' => 'subtitulo_post',
            'contenido' => 'contenido_post contenido_post contenido_post contenido_postcontenido_post contenido_post contenido_post contenido_post',
            'usuario_id' => 1,
            'privacidad_id' => 1,
            'estado_id' => 1
        ]);
        
        DB::table('posts')->insert([
            'titulo' => 'cuarto_post',
            'subtitulo' => 'subtitulo_post',
            'contenido' => 'contenido_post contenido_post contenido_post contenido_postcontenido_post contenido_post contenido_post contenido_post',
            'usuario_id' => 1,
            'privacidad_id' => 1,
            'estado_id' => 1
        ]);
    }
}
