<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240831155422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        # Farm
        $this->addSql("INSERT INTO farm (id, name, size, manager) VALUES (1, 'Bosco and Sons', 5.78, 'Harvey Gitthouse');");
        $this->addSql("INSERT INTO farm (id, name, size, manager) VALUES (2, 'Grady Group', 4.84, 'Therine Wilcott');");
        $this->addSql("INSERT INTO farm (id, name, size, manager) VALUES (3, 'Pouros Inc', 5.67, 'Keen Brazenor');");
        $this->addSql("INSERT INTO farm (id, name, size, manager) VALUES (4, 'Jerde-Dickinson', 5.39, 'Darill Schruyer');");
        $this->addSql("INSERT INTO farm (id, name, size, manager) VALUES (5, 'Hoppe-Herman', 4.34, 'Benji Castelletto');");
        $this->addSql("INSERT INTO farm (id, name, size, manager) VALUES (6, 'Johnson and Sons', 5.28, 'Corenda Izzett');");
        $this->addSql("INSERT INTO farm (id, name, size, manager) VALUES (7, 'Ritchie, Bednar and Johnson', 6.28, 'Daisey Karlolak');");
        $this->addSql("INSERT INTO farm (id, name, size, manager) VALUES (8, 'Sporer and Sons', 5.89, 'Tammie Checcuzzi');");
        $this->addSql("INSERT INTO farm (id, name, size, manager) VALUES (9, 'Simonis and Sons', 6.39, 'Mitchell Wyldish');");
        $this->addSql("INSERT INTO farm (id, name, size, manager) VALUES (10, 'Murazik-Jaskolski', 5.73, 'Willi Exton');");

        # Veterinarian
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (1, 'Errol Massy', 411);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (2, 'Eugenie Raynes', 8188);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (3, 'Teodoor McAllester', 8777);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (4, 'Lexi Yushmanov', 4107);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (5, 'Yankee Pennell', 2600);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (6, 'Phillie Selwood', 152);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (7, 'Stanfield De Filippis', 2676);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (8, 'Cher Bernasek', 7521);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (9, 'Melody Gossage', 377);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (10, 'Celine Divall', 3220);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (11, 'Fawnia Duckering', 4013);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (12, 'Lotty Lanahan', 2972);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (13, 'Lincoln Davidovics', 924);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (14, 'Hartwell Rosengren', 1095);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (15, 'Sheffield Maddern', 6227);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (16, 'Addie Forestel', 4369);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (17, 'Georg Walcar', 6082);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (18, 'Barth Brownhall', 6532);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (19, 'Kaleb Maccrea', 7526);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (20, 'Tannie Virgo', 6966);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (21, 'Missy Garrad', 272);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (22, 'Willow Greenwood', 5934);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (23, 'Barbra Carff', 4264);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (24, 'Maurits Rubinsaft', 4487);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (25, 'Nathaniel Teece', 1526);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (26, 'Cherise Marcum', 1497);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (27, 'Haslett Gargett', 6518);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (28, 'Coleen Radke', 4666);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (29, 'Clint Vaun', 1521);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (30, 'Shaun Reinisch', 881);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (31, 'Meggie Squier', 2718);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (32, 'Otes Wadeson', 2386);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (33, 'Wainwright Field', 1717);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (34, 'Brandice Aucutt', 5295);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (35, 'Hermina Livett', 536);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (36, 'Marcie Humburton', 4305);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (37, 'Adelbert Pinwill', 1954);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (38, 'Axel Sunock', 3250);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (39, 'Carlo Vegas', 8670);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (40, 'Janelle Woods', 1171);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (41, 'Oliver Mcmanaman', 8603);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (42, 'Alanson Cheshire', 865);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (43, 'Adara Barbrook', 5901);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (44, 'Willis Chansonnau', 8197);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (45, 'Pammi Wainwright', 8891);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (46, 'Tate Sherbourne', 1426);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (47, 'Janela Edsall', 9829);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (48, 'Hilda Stuck', 3971);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (49, 'Laurie Clemenceau', 2057);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (50, 'Mickie Welbeck', 4785);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (51, 'Lynnett Dmiterko', 10000);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (52, 'Ches Truss', 1238);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (53, 'Viviyan Donnell', 8696);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (54, 'Vince Jarmyn', 8655);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (55, 'Eustacia Kaaskooper', 7538);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (56, 'Correy Simonetto', 6732);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (57, 'Teresina Loughman', 5254);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (58, 'Toma Giacomucci', 1441);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (59, 'Laney Cleator', 223);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (60, 'Dan Bearfoot', 3121);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (61, 'Kyle Mohamed', 1572);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (62, 'Celestyna Vardon', 5182);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (63, 'Laird Prestage', 101);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (64, 'Demeter Caltera', 6697);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (65, 'Laurene Greensted', 422);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (66, 'Julio Annear', 739);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (67, 'Taryn Clougher', 9274);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (68, 'Cchaddie Caneo', 4294);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (69, 'Elsie Sullivan', 2231);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (70, 'Sidonnie Theobalds', 2333);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (71, 'Rick Polamontayne', 966);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (72, 'Son Gonthard', 4050);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (73, 'Stanley Crosse', 3284);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (74, 'Sylvester Sands-Allan', 5602);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (75, 'Tyler Keneforde', 7206);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (76, 'Yasmeen Haborn', 6735);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (77, 'Vyky Pockey', 4549);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (78, 'Dominic Agiolfinger', 785);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (79, 'Krystyna Lindfors', 1546);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (80, 'Rora Grayston', 3195);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (81, 'D''arcy Pyke', 1674);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (82, 'Jeff Kruger', 6992);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (83, 'Daffie Crookall', 3645);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (84, 'Jerrylee Shalloo', 5471);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (85, 'Glen Barday', 3256);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (86, 'Anna-diane Thow', 6221);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (87, 'Benny Chaucer', 1541);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (88, 'Ikey Bengoechea', 9991);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (89, 'Dredi Ambroziak', 2804);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (90, 'Olag Cutajar', 7679);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (91, 'Osgood Sherebrook', 1599);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (92, 'Orren Humphery', 8914);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (93, 'Nyssa Hendrick', 3109);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (94, 'Aurelia Geere', 2760);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (95, 'Guthrey Churchlow', 1724);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (96, 'Nomi Cliff', 516);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (97, 'Selie Baukham', 332);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (98, 'Willyt Kerwin', 286);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (99, 'Shannon Elphick', 3117);");
        $this->addSql("INSERT INTO veterinarian  (id, name, crmv) VALUES (100, 'Dari Enocksson', 1160);");

        # Cow
        for ($i = 1; $i <= 1000; $i++) {

            $milk_production = rand(10, 100);
            $weekly_feed = rand(100, 1000);
            $weight = rand(500, 2000);
            $birth = date('m/d/Y', mt_rand(strtotime('1/1/2015'), strtotime('12/31/2024')));
            $farm_id = rand(1, 10);
            $slaughtered = rand(0, 1) == '1' ? 'true' : 'false';

            $this->addSql("INSERT INTO cow (id, milk_production, weekly_feed, weight, birth, farm_id, slaughtered) VALUES ($i, $milk_production, $weekly_feed, $weight, '$birth', $farm_id, $slaughtered);");
        }

        # Veternarian - Farm

        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                $this->addSql("INSERT INTO farm_veterinarian (farm_id, veterinarian_id) VALUES ($i, $j + (($i - 1) * 10));");
            }
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
