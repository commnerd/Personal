import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PagesRoutingModule } from './pages-routing.module';
import { PagesComponent } from './pages.component';
import { LayoutsModule } from '@layouts/layouts.module';
import { IndexComponent } from './index/index.component';
import { MatGridListModule } from '@angular/material/grid-list';
import { MatCardModule } from '@angular/material/card';
import { MatMenuModule } from '@angular/material/menu';
import { MatIconModule } from '@angular/material/icon';
import { MatButtonModule } from '@angular/material/button';
import { LayoutModule } from '@angular/cdk/layout';

@NgModule({
  declarations: [
    PagesComponent,
    IndexComponent
  ],
  imports: [
    CommonModule,
    PagesRoutingModule,
    LayoutsModule,
    MatGridListModule,
    MatCardModule,
    MatMenuModule,
    MatIconModule,
    MatButtonModule,
    LayoutModule
  ]
})
export class PagesModule { }
