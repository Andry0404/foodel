insert into
    Proprietario(
        nome,
        cognome,
        email,
        data_nascita,
        hashed_password
    )
values
    (
        "Gianfranco",
        "Stradi",
        "gianfranco.stradi@mail.com",
        "1971-12-03",
        "123"
    ),
    (
        "Federica",
        "Grimaldi",
        "federica.grimaldi@mail.com",
        "1988-05-16",
        "123"
    ),
    (
        "Sasha",
        "Pricop",
        "sasha.pricop@mail.com",
        "1993-07-31",
        "123"
    );

insert into
    Ristorante(
        nome,
        orario_apertura,
        orario_chiusura,
        indirizzo,
        num_telefono
    )
values
    (
        "Ai quattro gradini",
        "11:30",
        "22:00",
        "Via Belfiore 4",
        "3334445566"
    ),
    (
        "La terrazza",
        "18:30",
        "02:30",
        "Piazza Castello 23",
        "3334445577"
    ),
    (
        "Pierogi in love",
        "09:30",
        "21",
        "Corso Francia 154",
        "3334445588"
    );

insert into
    Possiede(id_ristorante, id_proprietario)
values
    (1, 1),
    (2, 2),
    (3, 3);

insert into
    Prodotto(prezzo, nome, allergeni, ingredienti, categoria)
values
    (
        5.0,
        "Pizza margherita",
        "Glutine, latte",
        "Impasto 00, pomodoro, mozzarella",
        "primo"
    ),
    (
        6.5,
        "Pizza genovese",
        "Glutine, latte, arachidi",
        "Impasto integrale, mozzarella, pesto, pomodorini",
        "primo"
    ),
    (
        6.5,
        "Pizza calabrese",
        "Glutine, latte, anidride solforosa",
        "Impasto 00, pomodoro, mozzarella, nduja",
        "primo"
    ),
    (
        7.0,
        "Pizza quattro formaggi",
        "Glutine, latte",
        "Impasto integrale, mozzarella, fontina, gorgonzola, parmigiano",
        "primo"
    ),
    (
        8.0,
        "Pizza Gian",
        "Glutine, latte, uova",
        "Impasto 00, pomodoro, mozzarella, panna, uova, bacon",
        "primo"
    ),
    (
        9.5,
        "Pizza sfiziosa",
        "Glutine, latte, crostacei",
        "Impasto integrale, mozzarella, gamberetti, pomodorini, burrata",
        "primo"
    ),
    (
        4.5,
        "Pizza nutella",
        "Glutine, latte, frutta a guscio",
        "Impasto 00, nutella",
        "dessert"
    ),
    (
        10.0,
        "Vitello tonnato",
        "Pesce, sedano, senape",
        "Carne di vitello, salsa tonnata, capperi",
        "antipasto"
    ),
    (
        14.0,
        "Tagliere misto",
        "Glutine, latte, lupini",
        "Focaccia, pecorino dop, burrata, salame, prosciutto di parma dop, olive, lupini, peperoni",
        "antipasto"
    ),
    (
        16.5,
        "Plin fusion",
        "Glutine, uova, arachidi, sedano, soia",
        "Pasta all'uovo, maiale, carota, sedano, cipolla, salsa di soia, brodo di gallina",
        "primo"
    ),
    (
        18.0,
        "Risotto alle fragole",
        "Sedano, latte",
        "Riso carnaroli, fragole, parmigiano, stracciatella",
        "primo"
    ),
    (
        20.0,
        "Tagliata",
        "Senape",
        "Controfiletto di manzo, rucola, carote, pomodorini, salsa alla senape dolce",
        "secondo"
    ),
    (
        25.5,
        "Spigola all'acqua pazza",
        "Pesce, sedano",
        "Spigola, pomodorini, aglio, sedano, patate al forno",
        "secondo"
    ),
    (
        8.0,
        "Semifreddo al basilico",
        "Latte, frutta a guscio",
        "Panna, basilico, pistacchio",
        "dessert"
    ),
    (
        8.0,
        "Tartatin",
        "Uova",
        "Pasta frolla, mele, caramello",
        "dessert"
    ),
    (
        4.0,
        "Pancake Placki",
        "Uova",
        "Patate, uova, carote",
        "antipasto"
    ),
    (
        6.0,
        "Pierogi di carne",
        "Glutine, uova, latte",
        "Impasto all'uovo, patate, carne di manzo, burro, cipolla",
        "primo"
    ),
    (
        6.0,
        "Pierogi di patate",
        "Glutine, uova, latte",
        "Impasto all'uovo, patate, ricotta, panna acida, cipolla",
        "primo"
    ),
    (
        6.5,
        "Pierogi veg",
        "Glutine, soia, frutta a guscio",
        "Impasto vegano, patate, cipolla, zucchine, panna di soia, granella di mandorle",
        "primo"
    ),
    (
        8.0,
        "Zuppa Zurek",
        "Glutine, latte",
        "Pane, cipolla, panna acida",
        "primo"
    ),
    (
        4.0,
        "Torta Piernik veg",
        "Glutine, soia",
        "Farino di grano, farina di segale, zucchero, latte di soia, miele",
        "dessert"
    ),
    (
        5.0,
        "Pierogi alla fragola",
        "Glutine, uova, latte",
        "Impasto all'uovo, panna acida, composta di fragole",
        "dessert"
    );

insert into
    Vende(id_ristorante, id_prodotto)
values
    (1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (1, 5),
    (1, 6),
    (1, 7),
    (2, 8),
    (2, 9),
    (2, 10),
    (2, 11),
    (2, 12),
    (2, 13),
    (2, 14),
    (2, 15),
    (3, 16),
    (3, 17),
    (3, 18),
    (3, 19),
    (3, 20),
    (3, 21),
    (3, 22);
    