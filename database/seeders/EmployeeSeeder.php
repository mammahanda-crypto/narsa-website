<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            [
                'nom_prenom' => 'Ahmed Salem',
                'grade' => 'Administrateur',
                'effet_localite_direction' => 'Laayoune',
                'drpp' => 'DRPP001',
                'cin' => 'SA10001',
            ],
            [
                'nom_prenom' => 'Mohamed Brahim',
                'grade' => 'Technicien',
                'effet_localite_direction' => 'Dakhla',
                'drpp' => 'DRPP002',
                'cin' => 'SA10002',
            ],
            [
                'nom_prenom' => 'Salka Mint Ali',
                'grade' => 'Ingénieur',
                'effet_localite_direction' => 'Smara',
                'drpp' => 'DRPP003',
                'cin' => 'SA10003',
            ],
            [
                'nom_prenom' => 'Sidi Mohamed',
                'grade' => 'Agent',
                'effet_localite_direction' => 'Boujdour',
                'drpp' => 'DRPP004',
                'cin' => 'SA10004',
            ],
            [
                'nom_prenom' => 'El Khadra Mint Salem',
                'grade' => 'Secrétaire',
                'effet_localite_direction' => 'Laayoune',
                'drpp' => 'DRPP005',
                'cin' => 'SA10005',
            ],
            [
                'nom_prenom' => 'Brahim Ould Ahmed',
                'grade' => 'Chauffeur',
                'effet_localite_direction' => 'Dakhla',
                'drpp' => 'DRPP006',
                'cin' => 'SA10006',
            ],
            [
                'nom_prenom' => 'Fatimetou Mint Mohamed',
                'grade' => 'Technicien',
                'effet_localite_direction' => 'Smara',
                'drpp' => 'DRPP007',
                'cin' => 'SA10007',
            ],
            [
                'nom_prenom' => 'Moulaye Hassan',
                'grade' => 'Administrateur',
                'effet_localite_direction' => 'Boujdour',
                'drpp' => 'DRPP008',
                'cin' => 'SA10008',
            ],
            [
                'nom_prenom' => 'Leila Mint Brahim',
                'grade' => 'Ingénieur',
                'effet_localite_direction' => 'Laayoune',
                'drpp' => 'DRPP009',
                'cin' => 'SA10009',
            ],
            [
                'nom_prenom' => 'Ahmed Lamin',
                'grade' => 'Agent',
                'effet_localite_direction' => 'Dakhla',
                'drpp' => 'DRPP010',
                'cin' => 'SA10010',
            ],

            // 22 more employees

            [
                'nom_prenom' => 'Mohamed Ali Salem',
                'grade' => 'Technicien',
                'effet_localite_direction' => 'Laayoune',
                'drpp' => 'DRPP011',
                'cin' => 'SA10011',
            ],
            [
                'nom_prenom' => 'Sidi Brahim',
                'grade' => 'Agent',
                'effet_localite_direction' => 'Smara',
                'drpp' => 'DRPP012',
                'cin' => 'SA10012',
            ],
            [
                'nom_prenom' => 'Khadijetou Mint Ely',
                'grade' => 'Secrétaire',
                'effet_localite_direction' => 'Boujdour',
                'drpp' => 'DRPP013',
                'cin' => 'SA10013',
            ],
            [
                'nom_prenom' => 'Ali Ould Mohamed',
                'grade' => 'Administrateur',
                'effet_localite_direction' => 'Dakhla',
                'drpp' => 'DRPP014',
                'cin' => 'SA10014',
            ],
            [
                'nom_prenom' => 'Mouna Mint Salem',
                'grade' => 'Ingénieur',
                'effet_localite_direction' => 'Laayoune',
                'drpp' => 'DRPP015',
                'cin' => 'SA10015',
            ],
            [
                'nom_prenom' => 'Salem Ould Sidi',
                'grade' => 'Chauffeur',
                'effet_localite_direction' => 'Smara',
                'drpp' => 'DRPP016',
                'cin' => 'SA10016',
            ],
            [
                'nom_prenom' => 'Ahmedna Brahim',
                'grade' => 'Technicien',
                'effet_localite_direction' => 'Boujdour',
                'drpp' => 'DRPP017',
                'cin' => 'SA10017',
            ],
            [
                'nom_prenom' => 'Fatma Mint Ahmed',
                'grade' => 'Agent',
                'effet_localite_direction' => 'Laayoune',
                'drpp' => 'DRPP018',
                'cin' => 'SA10018',
            ],
            [
                'nom_prenom' => 'Mohamed Lemine',
                'grade' => 'Administrateur',
                'effet_localite_direction' => 'Dakhla',
                'drpp' => 'DRPP019',
                'cin' => 'SA10019',
            ],
            [
                'nom_prenom' => 'Sidiya Mint Ali',
                'grade' => 'Secrétaire',
                'effet_localite_direction' => 'Smara',
                'drpp' => 'DRPP020',
                'cin' => 'SA10020',
            ],
            [
                'nom_prenom' => 'Brahim Salem',
                'grade' => 'Technicien',
                'effet_localite_direction' => 'Boujdour',
                'drpp' => 'DRPP021',
                'cin' => 'SA10021',
            ],
            [
                'nom_prenom' => 'El Ghalia Mint Mohamed',
                'grade' => 'Ingénieur',
                'effet_localite_direction' => 'Laayoune',
                'drpp' => 'DRPP022',
                'cin' => 'SA10022',
            ],
            [
                'nom_prenom' => 'Lamine Ould Ahmed',
                'grade' => 'Agent',
                'effet_localite_direction' => 'Dakhla',
                'drpp' => 'DRPP023',
                'cin' => 'SA10023',
            ],
            [
                'nom_prenom' => 'Salka Mint Brahim',
                'grade' => 'Administrateur',
                'effet_localite_direction' => 'Smara',
                'drpp' => 'DRPP024',
                'cin' => 'SA10024',
            ],
            [
                'nom_prenom' => 'Mohamed Cheikh',
                'grade' => 'Technicien',
                'effet_localite_direction' => 'Boujdour',
                'drpp' => 'DRPP025',
                'cin' => 'SA10025',
            ],
            [
                'nom_prenom' => 'Aicha Mint Salem',
                'grade' => 'Secrétaire',
                'effet_localite_direction' => 'Laayoune',
                'drpp' => 'DRPP026',
                'cin' => 'SA10026',
            ],
            [
                'nom_prenom' => 'Ahmed Ould Ely',
                'grade' => 'Ingénieur',
                'effet_localite_direction' => 'Dakhla',
                'drpp' => 'DRPP027',
                'cin' => 'SA10027',
            ],
            [
                'nom_prenom' => 'Fatimetou Mint Sidi',
                'grade' => 'Agent',
                'effet_localite_direction' => 'Smara',
                'drpp' => 'DRPP028',
                'cin' => 'SA10028',
            ],
            [
                'nom_prenom' => 'Brahim Mohamed',
                'grade' => 'Technicien',
                'effet_localite_direction' => 'Boujdour',
                'drpp' => 'DRPP029',
                'cin' => 'SA10029',
            ],
            [
                'nom_prenom' => 'Leila Mint Ahmed',
                'grade' => 'Administrateur',
                'effet_localite_direction' => 'Laayoune',
                'drpp' => 'DRPP030',
                'cin' => 'SA10030',
            ],
            [
                'nom_prenom' => 'Salem Ould Ali',
                'grade' => 'Chauffeur',
                'effet_localite_direction' => 'Dakhla',
                'drpp' => 'DRPP031',
                'cin' => 'SA10031',
            ],
            [
                'nom_prenom' => 'Mouna Mint Mohamed',
                'grade' => 'Ingénieur',
                'effet_localite_direction' => 'Smara',
                'drpp' => 'DRPP032',
                'cin' => 'SA10032',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}