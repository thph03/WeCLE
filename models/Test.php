<?php
class Test {
    private $tests = [
        [
            "id" => 1,
            "name" => "Cambridge IELTS 10",
            "image" => "10.jpg",
            "description" => "Practice test from Cambridge IELTS 10. Includes Listening, Reading, Writing and Speaking.",
        ],
        [
            "id" => 2,
            "name" => "Cambridge IELTS 11",
            "image" => "11.jpg",
            "description" => "Practice test from Cambridge IELTS 11. Full test with answers and audio.",
        ],
        [
            "id" => 3,
            "name" => "Cambridge IELTS 12",
            "image" => "12.jpg",
            "description" => "Practice test from Cambridge IELTS 12. Improve your IELTS skills with real test papers.",
        ],
        [
            "id" => 4,
            "name" => "Cambridge IELTS 13",
            "image" => "13.jpg",
            "description" => "Authentic examination papers from Cambridge IELTS 13.",
        ],
        [
            "id" => 5,
            "name" => "Cambridge IELTS 14",
            "image" => "14.jpg",
            "description" => "Practice your IELTS Listening and Reading skills with Cambridge IELTS 14.",
        ],
        [
            "id" => 6,
            "name" => "Cambridge IELTS 15",
            "image" => "15.jpg",
            "description" => "Real IELTS test materials from Cambridge IELTS 15 for self-study.",
        ],
        [
            "id" => 7,
            "name" => "Cambridge IELTS 16",
            "image" => "16.jpg",
            "description" => "Most recent IELTS test set with answers from Cambridge IELTS 16.",
        ],
    ];

    public function getAllTests() {
        return $this->tests;
    }

    public function getTestById($id) {
        foreach ($this->tests as $test) {
            if ($test["id"] == $id) {
                return $test;
            }
        }
        return null;
    }

    public function getQuestionsByTestId($id) {
        // Mỗi bài kiểm tra có các câu hỏi mẫu
        $questions = [
            1 => [
                [
                    "question" => "What is the capital of France?",
                    "options" => ["Paris", "London", "Berlin", "Rome"],
                    "answer" => "Paris"
                ],
                [
                    "question" => "What is the largest ocean in the world?",
                    "options" => ["Atlantic", "Pacific", "Indian", "Arctic"],
                    "answer" => "Pacific"
                ],
                [
                    "question" => "Which planet is known as the Red Planet?",
                    "options" => ["Earth", "Mars", "Venus", "Jupiter"],
                    "answer" => "Mars"
                ],
                [
                    "question" => "What is the tallest mountain in the world?",
                    "options" => ["K2", "Mount Everest", "Kangchenjunga", "Lhotse"],
                    "answer" => "Mount Everest"
                ],
                [
                    "question" => "Who wrote the play 'Romeo and Juliet'?",
                    "options" => ["William Shakespeare", "Charles Dickens", "Jane Austen", "Mark Twain"],
                    "answer" => "William Shakespeare"
                ]
            ],
            2 => [
                [
                    "question" => "What is the capital of Japan?",
                    "options" => ["Tokyo", "Seoul", "Beijing", "Bangkok"],
                    "answer" => "Tokyo"
                ],
                [
                    "question" => "Which planet is closest to the Sun?",
                    "options" => ["Mercury", "Venus", "Earth", "Mars"],
                    "answer" => "Mercury"
                ],
                [
                    "question" => "What is the currency of the United Kingdom?",
                    "options" => ["Dollar", "Euro", "Pound", "Yen"],
                    "answer" => "Pound"
                ],
                [
                    "question" => "Who is the author of the Harry Potter series?",
                    "options" => ["J.K. Rowling", "George R.R. Martin", "J.R.R. Tolkien", "Dan Brown"],
                    "answer" => "J.K. Rowling"
                ],
                [
                    "question" => "What is the longest river in the world?",
                    "options" => ["Amazon", "Nile", "Yangtze", "Mississippi"],
                    "answer" => "Nile"
                ]
            ],
            3 => [
                [
                    "question" => "What is the capital of Canada?",
                    "options" => ["Ottawa", "Toronto", "Vancouver", "Montreal"],
                    "answer" => "Ottawa"
                ],
                [
                    "question" => "Who painted the Mona Lisa?",
                    "options" => ["Pablo Picasso", "Leonardo da Vinci", "Vincent van Gogh", "Claude Monet"],
                    "answer" => "Leonardo da Vinci"
                ],
                [
                    "question" => "What is the smallest country in the world?",
                    "options" => ["Vatican City", "Monaco", "Nauru", "San Marino"],
                    "answer" => "Vatican City"
                ],
                [
                    "question" => "Which country is known as the Land of the Rising Sun?",
                    "options" => ["China", "South Korea", "Japan", "Thailand"],
                    "answer" => "Japan"
                ],
                [
                    "question" => "What is the hardest natural substance on Earth?",
                    "options" => ["Gold", "Platinum", "Diamond", "Iron"],
                    "answer" => "Diamond"
                ]
            ],
            4 => [
                [
                    "question" => "What is the capital of Italy?",
                    "options" => ["Venice", "Rome", "Milan", "Florence"],
                    "answer" => "Rome"
                ],
                [
                    "question" => "Which gas do plants use for photosynthesis?",
                    "options" => ["Oxygen", "Nitrogen", "Carbon Dioxide", "Hydrogen"],
                    "answer" => "Carbon Dioxide"
                ],
                [
                    "question" => "What is the most spoken language in the world?",
                    "options" => ["English", "Mandarin", "Spanish", "Hindi"],
                    "answer" => "Mandarin"
                ],
                [
                    "question" => "Who discovered penicillin?",
                    "options" => ["Marie Curie", "Isaac Newton", "Alexander Fleming", "Louis Pasteur"],
                    "answer" => "Alexander Fleming"
                ],
                [
                    "question" => "What is the largest continent by area?",
                    "options" => ["Africa", "Asia", "North America", "Europe"],
                    "answer" => "Asia"
                ]
            ],
            5 => [
                [
                    "question" => "What is the capital of Australia?",
                    "options" => ["Sydney", "Melbourne", "Canberra", "Brisbane"],
                    "answer" => "Canberra"
                ],
                [
                    "question" => "Which country has the most official languages?",
                    "options" => ["Switzerland", "India", "South Africa", "Canada"],
                    "answer" => "India"
                ],
                [
                    "question" => "What is the largest animal on Earth?",
                    "options" => ["Elephant", "Blue Whale", "Shark", "Giraffe"],
                    "answer" => "Blue Whale"
                ],
                [
                    "question" => "Which element has the chemical symbol 'O'?",
                    "options" => ["Oxygen", "Osmium", "Ozone", "Oganesson"],
                    "answer" => "Oxygen"
                ],
                [
                    "question" => "What is the national flower of Japan?",
                    "options" => ["Rose", "Cherry Blossom", "Tulip", "Lotus"],
                    "answer" => "Cherry Blossom"
                ]
            ],
            6 => [
                [
                    "question" => "Which city is the capital of Russia?",
                    "options" => ["Moscow", "Saint Petersburg", "Novosibirsk", "Yekaterinburg"],
                    "answer" => "Moscow"
                ],
                [
                    "question" => "What is the largest desert in the world?",
                    "options" => ["Sahara", "Arabian", "Gobi", "Kalahari"],
                    "answer" => "Sahara"
                ],
                [
                    "question" => "Which ocean is the largest?",
                    "options" => ["Atlantic", "Pacific", "Indian", "Arctic"],
                    "answer" => "Pacific"
                ],
                [
                    "question" => "Which country is known for its pyramids?",
                    "options" => ["Egypt", "Greece", "Italy", "Mexico"],
                    "answer" => "Egypt"
                ],
                [
                    "question" => "Who was the first man to step on the Moon?",
                    "options" => ["Neil Armstrong", "Buzz Aldrin", "Yuri Gagarin", "Michael Collins"],
                    "answer" => "Neil Armstrong"
                ]
            ],
            7 => [
                [
                    "question" => "Which country is the Eiffel Tower located in?",
                    "options" => ["Germany", "Italy", "Spain", "France"],
                    "answer" => "France"
                ],
                [
                    "question" => "What is the longest river in Asia?",
                    "options" => ["Yangtze", "Ganges", "Mekong", "Indus"],
                    "answer" => "Yangtze"
                ],
                [
                    "question" => "Which is the smallest ocean?",
                    "options" => ["Atlantic", "Indian", "Arctic", "Pacific"],
                    "answer" => "Arctic"
                ],
                [
                    "question" => "What is the main ingredient in guacamole?",
                    "options" => ["Tomato", "Avocado", "Onion", "Lemon"],
                    "answer" => "Avocado"
                ],
                [
                    "question" => "Who painted the Sistine Chapel ceiling?",
                    "options" => ["Pablo Picasso", "Vincent van Gogh", "Leonardo da Vinci", "Michelangelo"],
                    "answer" => "Michelangelo"
                ]
            ],
        ];
        return $questions[$id] ?? [];
    }
}
?>
