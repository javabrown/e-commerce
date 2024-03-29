import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor() { }

  getProducts(): Observable<any> {
    // Hardcoded JSON data
    const products = [
      {
        "id": "2",
        "name": "Product 2",
        "description": "Description of product 2",
        "price": "49.99",
        "category": "Category B",
        "stock_quantity": "50",
        "sku": "SKU002",
        "images": "image2.jpg",
        "attributes": "Color: Blue, Size: Medium",
        "status": "published",
        "created_at": "2024-02-28 23:19:58",
        "updated_at": "2024-02-28 23:19:58"
      },
      {
        "id": "3",
        "name": "Product 3",
        "description": "Description of product 3",
        "price": "39.99",
        "category": "Category A",
        "stock_quantity": "75",
        "sku": "SKU003",
        "images": "image3.jpg",
        "attributes": "Color: Green, Size: Small",
        "status": "draft",
        "created_at": "2024-02-28 23:19:58",
        "updated_at": "2024-02-28 23:19:58"
      },
      // Add other products here...
    ];

    // Return the hardcoded data as an observable
    return of(products);
  }
}
