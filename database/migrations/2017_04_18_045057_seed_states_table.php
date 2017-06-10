<?php

use App\Models\State\State;
use Illuminate\Database\Migrations\Migration;

class SeedStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $statesCsv = <<<STATES
        1,Alabama,AL
        2,Alaska,AK
        3,Arizona,AZ
        4,Arkansas,AR
        5,California,CA
        6,Colorado,CO
        7,Connecticut,CT
        8,Delaware,DE
        9,Florida,FL
        10,Georgia,GA
        11,Hawaii,HI
        12,Idaho,ID
        13,Illinois,IL
        14,Indiana,IN
        15,Iowa,IA
        16,Kansas,KS
        17,Kentucky,KY
        18,Louisiana,LA
        19,Maine,ME
        20,Maryland,MD
        21,Massachusetts,MA
        22,Michigan,MI
        23,Minnesota,MN
        24,Mississippi,MS
        25,Missouri,MO
        26,Montana,MT
        27,Nebraska,NE
        28,Nevada,NV
        29,New Hampshire,NH
        30,New Jersey,NJ
        31,New Mexico,NM
        32,New York,NY
        33,North Carolina,NC
        34,North Dakota,ND
        35,Ohio,OH
        36,Oklahoma,OK
        37,Oregon,OR
        38,Pennsylvania,PA
        39,Rhode Island,RI
        40,South Carolina,SC
        41,South Dakota,SD
        42,Tennessee,TN
        43,Texas,TX
        44,Utah,UT
        45,Vermont,VT
        46,Virginia,VA
        47,Washington,WA
        48,West Virginia,WV
        49,Wisconsin,WI
        50,Wyoming,WY
        51,District of Columbia,DC
        52,Puerto Rico,PR
        53,U.S. Armed Forces - Americas,AA
        54,U.S. Armed Forces - Europe,AE
        55,U.S. Armed Forces - Pacific,AP
        56,American Samoa,AS
        57,Federated States of Micronesia,FM
        58,Guam,GU
        59,Marshall Islands,MH
        60,Northern Mariana Islands,MP
        61,Palau,PW
        62,Virgin Islands,VI
STATES;

        foreach (explode("\n", $statesCsv) as $line) {
            list($id, $name, $abbreviation) = array_map('trim', str_getcsv($line));

            /** @var State $state */
            $state = new State;

            $state->id = $id;
            $state->name = $name;
            $state->abbreviation = $abbreviation;

            $state->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('TRUNCATE TABLE states CASCADE');
    }
}
