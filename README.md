# Deník vývoje Laravel aplikace

## 1. Inicializace projektu

Začal jsem vytvořením nového Laravel projektu pomocí Composeru. Následně jsem nakonfiguroval základní nastavení jako připojení k databázi a environment proměnné.

Odkaz na dokumentaci: [Laravel Installation](https://laravel.com/docs/10.x/installation)

## 2. Vytvoření modelů a migrací

Vytvořil jsem modely `Category` a `Product` s příslušnými migracemi. Pro kategorie jsem implementoval vztah parent-child pomocí `parent_id`.

Odkaz na dokumentaci:

-   [Eloquent: Getting Started](https://laravel.com/docs/10.x/eloquent)
-   [Migrations](https://laravel.com/docs/10.x/migrations)

```php
// Příklady modelů
class Category extends Model {
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
```

## 3. Tvorba controllerů

Vytvořil jsem CRUD controllery pro správu kategorií a produktů v admin sekci a základní controllery pro frontend.

Odkaz na dokumentaci: [Controllers](https://laravel.com/docs/10.x/controllers)

## 4. Implementace cest (routes)

Definoval jsem routy pro admin sekci i pro frontend shopu, včetně resource rout pro CRUD operace.

Odkaz na dokumentaci: [Routing](https://laravel.com/docs/10.x/routing)

```php
Route::resource('admin/categories', CategoryController::class);
Route::resource('admin/products', ProductController::class);
```

## 5. Tvorba Blade šablon

Vytvořil jsem základní layout a dědičnou strukturu šablon. Implementoval jsem admin rozhraní pro správu kategorií a produktů a uživatelské rozhraní pro prohlížení shopu.

Odkaz na dokumentaci: [Blade Templates](https://laravel.com/docs/10.x/blade)

## 6. Validace a ukládání dat

Implementoval jsem validaci vstupních dat pro vytváření a editaci produktů a kategorií, včetně validace obrázků.

Odkaz na dokumentaci: [Validation](https://laravel.com/docs/10.x/validation)

```php
$request->validate([
    'name' => 'required|string|max:255',
    'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
]);
```

## 7. Správa obrázků

Implementoval jsem nahrávání a správu obrázků produktů pomocí Laravel Filesystemu.

Odkaz na dokumentaci: [Filesystem / Cloud Storage](https://laravel.com/docs/10.x/filesystem)

## 8. Košík

Vytvořil jsem jednoduchý košík pomocí session, který umožňuje přidávat, odebírat a mazat položky.

## 9. Autentizace

Použil jsem Laravel Breeze pro základní autentizaci administrátorů.

Odkaz na dokumentaci: [Authentication](https://laravel.com/docs/10.x/authentication)

# Deník vývoje Laravel aplikace - Pokračování

## 10. Implementace objednávkového systému

### 10.1 Vytvoření modelů a migrací pro objednávky

Vytvořil jsem modely `Order` a `OrderItem` s příslušnými migracemi pro ukládání objednávek do databáze.

```php
// Order model
class Order extends Model {
    protected $fillable = ['customer_name', 'customer_email', 'total'];

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}

// OrderItem model
class OrderItem extends Model {
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
```

Odkaz na dokumentaci: [Eloquent Relationships](https://laravel.com/docs/10.x/eloquent-relationships)

### 10.2 Checkout proces

Implementoval jsem checkout proces v `CartController` s následujícími kroky:

1. Validace zákaznických údajů
2. Vytvoření objednávky v databázi
3. Generování PDF souhrnu
4. Odeslání potvrzovacího emailu
5. Vyprázdnění košíku

```php
public function checkout(Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    // Vytvoření objednávky
    $order = Order::create([
        'customer_name' => $validated['name'],
        'customer_email' => $validated['email'],
        'total' => $this->calculateTotal(),
    ]);

    // Přidání položek
    foreach(session('cart', []) as $item) {
        $order->items()->create([
            'product_id' => $item['product']->id,
            'quantity' => $item['quantity'],
            'price' => $item['product']->price,
        ]);
    }

    // Generování PDF
    $pdf = PDF::loadView('orders.summary', ['order' => $order]);

    // Vyprázdnění košíku
    session()->forget('cart');

    // Stažení PDF
    return $pdf->download("order-{$order->id}.pdf");
}
```

### 10.3 Generování PDF

Pro generování PDF jsem použil balíček `barryvdh/laravel-dompdf`. Vytvořil jsem šablonu `resources/views/orders/summary.blade.php` pro výpis objednávky.

Odkaz na dokumentaci: [Laravel-Dompdf](https://github.com/barryvdh/laravel-dompdf)

## Výhody a nevýhody Laravel frameworku

### Výhody:

1. **Elegantní syntaxe** - Laravel nabízí čitelnou a expresivní syntaxi
2. **Bohatá dokumentace** - Výborná dokumentace s mnoha příklady
3. **Eloquent ORM** - Výkonný a intuitivní ORM systém
4. **Blade šablony** - Výkonný templatovací engine s dědičností
5. **Artisan CLI** - Užitečné nástroje pro vývoj
6. **Zabudovaná bezpečnost** - CSRF ochrana, validace, escapování atd.

### Nevýhody:

1. **Učení - syntaxe** - Pro začátečníky může být složitější
2. **Paměťová náročnost** - Vyšší paměťové nároky než některé jiné frameworky
3. **Přísná struktura** - Nutnost dodržovat konvence frameworku
