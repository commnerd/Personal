import {Component, Input, OnChanges, OnInit, SimpleChanges} from '@angular/core';
import { Package } from '@interfaces/composer/package';
import { PackageService } from '@services/models/composer/package.service';
import { FormBuilder, FormGroup, FormArray } from '@angular/forms';
import { Location } from '@angular/common';
import { first } from "rxjs";

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit, OnChanges {

  @Input() pkg!: Package | null;
  packageForm!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private packageService: PackageService,
    private location: Location
  ) {}

  ngOnInit(): void {
    this.packageForm = this.formBuilder.group(this.pkg || {
      id: [''],
      name: [''],
      type: [''],
      version: [''],
      sources: this.formBuilder.array([])
    });
  }

  ngOnChanges(changes: SimpleChanges): void {
    if(this.pkg) {
      this.packageForm.patchValue({
        id: changes['pkg'].currentValue.id,
        name: changes['pkg'].currentValue.name,
        type: changes['pkg'].currentValue.type,
        version: changes['pkg'].currentValue.version,
        sources: [],
      });
      let sources = changes['pkg'].currentValue.sources;
      for(let i = 0; i < sources.length; i++) {
        (<FormArray>this.packageForm.get('sources')).push(
          this.formBuilder.group(sources[i])
        );
      }
    }
  }

  onSubmit() {
    this.packageService.save(this.packageForm.value).pipe(first()).subscribe( (rs) => {
      this.location.back();
    });
  }

  addSource() {
    (<FormArray>this.packageForm.get('sources')).push(
      this.formBuilder.group({ reference: [''], type: [''], url: [''] })
    );
  }

  trackFn(i: number) {
    return i;
  }
}
