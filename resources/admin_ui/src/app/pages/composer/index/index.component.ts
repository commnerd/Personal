import { Component, OnInit } from '@angular/core';
import { Paginated } from '../../../interfaces/laravel/paginated';
import { Package } from '../../../interfaces/composer/package';
import { Observable } from 'rxjs';
import { PackageService } from '../../../services/models/composer/package.service';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  packages$ !: Observable<Paginated<Package>>;

  constructor(
    private packageService: PackageService
  ) {}
  
  ngOnInit(): void {
    this.packages$ = this.packageService.list();
  }
}
