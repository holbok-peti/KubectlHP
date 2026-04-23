import { CommonModule } from '@angular/common';
import { HttpClient } from '@angular/common/http';
import { ChangeDetectorRef, Component } from '@angular/core';
import { FormsModule, NgForm } from '@angular/forms';

interface Entry {
  nev: string;
  ertek_a: number | null;
  ertek_b: number | null;
  eredmeny: number | null;
}

@Component({
  selector: 'app-app-szamlalo',
  imports: [FormsModule, CommonModule],
  templateUrl: './app-szamlalo.html',
  styleUrls: ['./app-szamlalo.css']
})
export class AppSzamlalo {

  szamlalo_nev: string = '';
  input_a: number | null = null;
  input_b: number | null = null;
  errorMessage: string = '';
  isSubmitting: boolean = false;

  history: Entry[] = [];

  ngOnInit(){
    console.log('Loading history...');
    this.loadHistory();
  }

    loadHistory() {
    this.http.get('/api/szamlalo').subscribe({
      next: (res: any) => {
        this.history = res.map((item: any) => ({
          nev: item.nev,
          ertek_a: item.ertek_a,
          ertek_b: item.ertek_b,
          eredmeny: item.eredmeny
        }));
        console.log('History loaded');
        this.cdr.detectChanges();
      },
      error: (err) => {
        console.error('Failed to load history:', err);
        this.cdr.detectChanges();
      }
    });
  }

  constructor(
    private http: HttpClient,
    private cdr: ChangeDetectorRef
  ) {}

  submit(form: NgForm) {
    if (form.invalid || this.isSubmitting) {
      return;
    }

    this.errorMessage = '';
    this.isSubmitting = true;

    const payload = {
      nev: this.szamlalo_nev.trim(),
      ertek_a: Number(this.input_a),
      ertek_b: Number(this.input_b)
    };

    this.http.post('/api/szamlalo', payload)
      .subscribe({
        next: (res: any) => {
          form.resetForm({
            szamlalo_nev: '',
            input_a: null,
            input_b: null
          });

          this.isSubmitting = false;
          this.loadHistory();
          this.cdr.detectChanges();
        },
        error: (err) => {
          this.errorMessage = Object.values(err?.error?.errors ?? {})
            .flat()
            .join(' ') || 'Request failed.';
          this.isSubmitting = false;
          this.cdr.detectChanges();
        }
      });
  }
}
