import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http'; // Import HttpClientModule

import { ListProductComponent } from '../list-product/list-product.component';

@NgModule({
  declarations: [
    ListProductComponent
    // Add other components here
  ],
  imports: [
    CommonModule,
    HttpClientModule
    // Add other modules here
  ],
  exports: [
    ListProductComponent
    // Add other components to be used outside the module
  ]
})
export class SharedModule { }

