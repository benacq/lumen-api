<?php


class ProductsTest extends TestCase
{

    /** @test */
    public function should_return_all_products(): void
    {
        $this->get("/api/products", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            [
                "id",
                "product_name",
                "price",
                "quantity",
                "discount",
                "created_at",
                "updated_at"
            ]
        ]);
    }

    /** @test */
    public function should_show_all_products(): void
    {
        $response = $this->call('GET', '/api/products');
        self::assertEquals(200, $response->status());
    }


    /** @test */
    public function should_return_one_product(): void
    {
        $this->get("/api/products/1", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            "id",
            "product_name",
            "price",
            "quantity",
            "discount",
            "created_at",
            "updated_at"
        ]);
    }


    /** @test */
    public function should_create_new_product(): void
    {
        $parameters = [
            "product_name" => "Test create new product",
            "price" => 56.0,
            "quantity" => 4,
            "discount" => 7,
        ];

        $this->post("/api/products", $parameters);
        $this->seeStatusCode(201);
        $this->seeJsonStructure([
            "id",
            "product_name",
            "price",
            "quantity",
            "discount",
            "created_at",
            "updated_at"
        ]);
    }


    /** @test */
    public function should_update_one_product(): void
    {
        $parameters = [
            "product_name" => "Test UPDATE product",
            "price" => 46.0,
            "quantity" => 24,
            "discount" => 27,
        ];

        $this->put("/api/products/5", $parameters);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            "id",
            "product_name",
            "price",
            "quantity",
            "discount",
            "created_at",
            "updated_at"
        ]);
    }

    /** @test */
    public function should_delete_one_product(): void
    {
        $this->delete("/api/products/9", [], []);
        $this->seeStatusCode(204);
    }
}
