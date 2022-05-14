INSERT INTO laravel.plans (name, url, stripe_id, price, recomended, description, created_at, updated_at, enum_label)
VALUES ('Plano Stander', 'plano-stander', 'price_1Kt0rXC4z7yx5elflJRXvREL', 300, DEFAULT,
        'plano com mais acessos e vantagens ao basico', null, null, 'varios acessos');
INSERT INTO laravel.plans (name, url, stripe_id, price, recomended, description, created_at, updated_at, enum_label)
VALUES ('Plano Premium', 'plano-premium', 'price_1Kt0lhC4z7yx5elfjLr0XzYE', 456, DEFAULT,
        'acesso a todo conteu e historico de mudanças ', null, null, 'todo acesso 100% liberado');

UPDATE laravel.plans t
SET t.enum_label = 'anual'
WHERE t.id = 3;

UPDATE laravel.plans t
SET t.enum_label = 'semestral'
WHERE t.id = 2;

UPDATE laravel.plans t
SET t.enum_label = 'mensal'
WHERE t.id = 1;

INSERT INTO laravel.features (plan_id, name, created_at, updated_at)
VALUES (2, 'para quem já tem algum conhecimento', null, null);
INSERT INTO laravel.features (plan_id, name, created_at, updated_at)
VALUES (3, 'para profissionais da área', null, null);
INSERT INTO laravel.features (plan_id, name, created_at, updated_at)
VALUES (3, 'acesso ilimitado', null, null);


