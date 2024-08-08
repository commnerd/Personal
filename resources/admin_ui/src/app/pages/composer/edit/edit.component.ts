import { Component, Input, OnInit } from '@angular/core';
import { Package } from '../../../interfaces/composer/package';
import {first, Observable, of} from 'rxjs';
import { PackageService } from '../../../services/models/composer/package.service';
import { ActivatedRoute, ParamMap } from '@angular/router';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent implements OnInit {

  @Input() package$!: Observable<Package | null>;

  constructor(
    private packageService: PackageService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {
    this.route.params.pipe(first()).subscribe(params => {
      this.package$ = this.packageService.get(params['id'] as number);
    });
  }


}
