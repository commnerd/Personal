import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditComponent } from './edit.component';
import { QuoteService } from '../../../services/models/quote.service';
import { HttpClient, HttpHandler } from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';
import { RouterTestingModule } from '@angular/router/testing';
import { FormComponent } from '../form/form.component';

import { QuotesModule } from "@pages/quotes/quotes.module";

describe('EditComponent', () => {
  let component: EditComponent;
  let fixture: ComponentFixture<EditComponent>;
  let quoteService: QuoteService;
  let activatedRoute: ActivatedRoute;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [QuotesModule, RouterTestingModule],
      providers: [QuoteService, HttpClient, HttpHandler],
      declarations: [EditComponent, FormComponent]
    });
    fixture = TestBed.createComponent(EditComponent);
    quoteService = TestBed.inject(QuoteService);
    activatedRoute = TestBed.inject(ActivatedRoute);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
