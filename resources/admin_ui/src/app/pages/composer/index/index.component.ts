import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { PackageService } from '../../../services/models/composer/package.service';
import { Paginated } from '../../../interfaces/laravel/paginated';
import { Package } from '../../../interfaces/composer/package';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss'],
  standalone: true,
  imports: [ CommonModule ]
})
export class IndexComponent implements OnInit {

  packages$!: Observable<Paginated<Package>>;

  constructor(
    private packageService: PackageService,
  ) {}

  ngOnInit(): void {
    this.packages$ = this.packageService.list();
  }
}
