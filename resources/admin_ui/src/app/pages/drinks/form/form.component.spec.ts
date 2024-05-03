import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormComponent } from './form.component';
import {BrowserAnimationsModule} from "@angular/platform-browser/animations";
import {DrinksModule} from "@pages/drinks/drinks.module";
import {HttpClientTestingModule} from "@angular/common/http/testing";

describe('FormComponent', () => {
  let component: FormComponent;
  let fixture: ComponentFixture<FormComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ BrowserAnimationsModule, DrinksModule, HttpClientTestingModule ],
      declarations: [ FormComponent ]
    });
    fixture = TestBed.createComponent(FormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
