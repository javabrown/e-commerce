import { Component, OnInit } from '@angular/core';
import { ApiService } from '../services/api.service';

@Component({
  selector: 'app-list-product',
  templateUrl: './list-product.component.html',
  styleUrls: ['./list-product.component.css']
})
export class ListProductComponent implements OnInit {
  products: any[] = [];

  constructor(private apiService: ApiService) { }

  ngOnInit(): void {
    console.log("Making Get Products API call...");
    this.apiService.getProducts().subscribe(data => {
      console.log(data);
      this.products = data;
    });
  }
}
