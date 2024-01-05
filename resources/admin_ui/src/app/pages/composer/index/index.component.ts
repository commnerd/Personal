import { Component, OnInit } from '@angular/core';
import { Paginated } from '../../../interfaces/laravel/paginated';
import { Package } from '../../../interfaces/composer/package';
import { Observable } from 'rxjs';
import { PackageService } from '../../../services/models/composer/package.service';
import { Router } from '@angular/router';
import {
  DeleteConfirmationDialogComponent
} from "@partials/delete-confirmation-dialog/delete-confirmation-dialog.component";
import { MatDialog } from "@angular/material/dialog";
import { PackageSource } from "@interfaces/composer/package_source";
import {PackageSourceService} from "@services/models/composer/package-source.service";

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  packages$ !: Observable<Paginated<Package> | null>;
  packageSources$ !: Observable<Paginated<Package> | null>


  constructor(
    private packageService: PackageService,
    private packageSourceService: PackageSourceService,
    private router: Router,
    private dialog: MatDialog,
  ) {}

  ngOnInit(): void {
    this.packages$ = this.packageService.list();
    this.packageSources$ = this.packageSourceService.list();
  }

  addPackage() {
    this.router.navigate(['composer', 'create']);
  }

  editPackage(pkg: Package) {
    this.router.navigate(['composer', pkg.id, 'edit']);
  }

  deletePackage(pkg: Package) {
    let dialogSubscription = this.dialog
      .open(DeleteConfirmationDialogComponent)
      .afterClosed()
      .subscribe(result => {
        let deleteSubscription = this.packageService.delete(pkg.id!).subscribe(() => {
          this.ngOnInit();
          setTimeout(() => deleteSubscription.unsubscribe());
        });
        setTimeout(() => dialogSubscription.unsubscribe());
      });
  }
}
