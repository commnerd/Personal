import { Component, Input, OnInit } from '@angular/core';
import { Package } from '../../../interfaces/composer/package';
import { Observable, of } from 'rxjs';
import { PackageService } from '../../../services/models/composer/package.service';
import { ActivatedRoute, ParamMap } from '@angular/router';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent implements OnInit {
  
  @Input() package!: Package | number;

  constructor(
    private packageService: PackageService,
    private route: ActivatedRoute,

  ) {}

  ngOnInit(): void {
    let paramSubscriber = this.route.params.subscribe(params => {
      let serviceSubscriber = this.packageService.get(params['id'] as number).subscribe(pkg => {
        serviceSubscriber.unsubscribe();
        this.package = pkg;
      });
      setTimeout(() => paramSubscriber.unsubscribe(), 0);
    });    
  }

  
}
