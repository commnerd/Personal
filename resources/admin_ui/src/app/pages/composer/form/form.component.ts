import {Component, Input, OnChanges, OnInit, SimpleChanges} from '@angular/core';
import { Package } from '../../../interfaces/composer/package';
import { PackageService } from '../../../services/models/composer/package.service';
import {FormBuilder, FormGroup, FormArray, FormControl} from '@angular/forms';
import { Router } from '@angular/router';

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
    private router: Router
  ) {}

  ngOnInit(): void {
    this.packageForm = this.formBuilder.group({
      name: '',
      version: '',
      type: '',
      sources: this.formBuilder.array([]),
    });
  }

  ngOnChanges(changes: SimpleChanges): void {
    if(this.pkg) {
      this.packageForm.setValue({
        name: changes['pkg']?.currentValue.name,
        type: changes['pkg']?.currentValue.type,
        version: changes['pkg']?.currentValue.version,
        sources: changes['pkg'].currentValue.sources,
      });
    }
  }

  onSubmit() {
    let subscriber = this.packageService.save(Object.assign(this.pkg!, this.packageForm.value)).subscribe( (rs) => {
      subscriber.unsubscribe();
      this.router.navigate(['composer']);
    });
  }

  addSource() {
    (<FormArray>this.packageForm.get('sources')).push(
      this.formBuilder.group({ reference: '', type: '', url: '' })
    );
  }

  trackFn(i: number) {
    console.log('hi');
    return i;
  }
}
