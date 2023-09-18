import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { PackageService } from '../../../services/models/composer/package.service';
import { Paginated } from '../../../interfaces/laravel/paginated';
import { Package } from '../../../interfaces/composer/package';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  packages$!: Paginated<Package>;

  constructor(
    private packageService: PackageService,
  ) {}

  ngOnInit(): void {
    let subscription = this.packageService.list().subscribe((response) => {
      this.packages$ = response;
      console.log(response);
      subscription.unsubscribe();
    });
  }
}
